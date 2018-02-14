<?php
include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/login_session.php');
header('Content-Type:text/html; charset=UTF-8');

if(!isset($_POST['buy_confirm'])){
    header('Location: /halcinema/user/');
    exit();
}

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/mysqlenv.php');

try{
    $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
    if($dbh == null){
        exit('DB接続失敗');
    }
    $dbh->query('set names utf8');
    //予約テーブルへ格納
    $resSql = " insert into t_reservation ";
    $resSql .= " (mem_mail, show_id, res_reg) ";
    $resSql .= " values('".$MemMail."', '".$_SESSION['showId']."', now()) ";
    $stmt = $dbh->query($resSql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    //予約番号取得
    $resNum = $dbh->lastInsertId('res_num');
    foreach($_SESSION["seats"] as $pointer => $value){
        //予約チケットテーブルへ格納
        $ticSql = " insert into t_reservation_ticket ";
        $ticSql .= " (res_num, res_seat, ticket_num) ";
        $ticSql .= " values(".$resNum.", '".$pointer."', '".$value."') ";
        $stmt = $dbh->query($ticSql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        //席状況テーブル更新
        $sconSql = " update t_scon set ".$pointer." = '2' where show_id = ".$_SESSION['showId'];
        $stmt = $dbh->query($sconSql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    }
}catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}
$dbh = null;

header('Location: /halcinema/user/ticket/result.php');
exit();
?>
