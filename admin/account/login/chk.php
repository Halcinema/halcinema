<?php
header('Content-Type:text/html; charset=UTF-8');
$Num = $Pass = '';

if(!isset($_POST['btn'])){
    header('Location: /halcinema/admin/account/login/');
}

$num = $_POST['num'];
$pass = $_POST['pass'];

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/admin/mysqlenv.php');

try{
    $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
    if($dbh == null){
        exit('DB接続失敗');
    }
    $dbh->query('set names utf8');
    $sql = " select t_admin.*, t_theater.* from t_admin, t_theater ";
    $sql .= " where admin_num = '".$num."' ";
    $sql .= " and t_admin.the_num = t_theater.the_num ";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
}catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}
$dbh = null;

if($count !== 0){
    if($result['admin_pass'] == $pass){
        session_start();
        $_SESSION['admin']['adminNum'] = $result['admin_num'];
        $_SESSION['admin']['adminName'] = $result['admin_name_kanji'];
        $_SESSION['admin']['adminTheName'] = $result['the_name'];
        $_SESSION['admin']['adminTheNum'] = $result['the_num'];
        header('Location: /halcinema/admin/');
        exit();
    }else{
        header('Location: /halcinema/admin/account/login/?err=1&num='.$num);
        exit();
    }
}else{
    header('Location: /halcinema/admin/account/login/?err=2&num='.$num);
    exit();
}
?>
