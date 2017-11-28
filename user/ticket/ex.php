<?php
include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "購入完了 | 予約";
if(!isset($_POST["buy_confirm"])){
    header("Location: /halcinema/user/");
    exit();
}
include("../mysqlenv.php");

if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
    exit("MySQL接続エラー<br />" . mysqli_connect_error());
}

$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . $SQL);
}

if(!mysqli_select_db($Link,$DB)){
  exit("MySQLデータベース選択エラー<br />" . $DB);
}

foreach($_SESSION["seats"] as $pointer => $value){
    $SQL = "insert into t_reservation(ticket_num, mem_mail, show_id, res_seat, res_reg, pay_num)";
    $SQL .= " values('".$value."', '".$MemMail."', '".$_SESSION["showId"]."', '".$pointer."', now(), ".$_SESSION["pay"].")";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
    }
    $SQL = "update t_scon set ".$pointer." = '2' where show_id = ".$_SESSION["showId"];
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
    }
}

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="ex">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>ご購入が完了しました。</h2>
                <a href="../index.php">トップへ戻る</a>
            </div>
            <div class="right">
            </div>
        </div>
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
