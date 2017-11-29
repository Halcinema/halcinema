<?php
$pageTitle = "登録完了 | 新規会員登録";
$mem_fk = "";
$mem_gk = "";
$mem_ff = "";
$mem_gf = "";
$mem_sex = "";
$mem_birth = "";
$mem_tel = "";
$mem_post = "";
$mem_pref = "";
$mem_city = "";
$mem_add = "";
$mem_mail = "";
$mem_pass = "";
if(isset($_POST["next"])){
    $mem_fk = $_POST["mem_fk"];
    $mem_gk = $_POST["mem_gk"];
    $mem_ff = $_POST["mem_ff"];
    $mem_gf = $_POST["mem_gf"];
    $mem_sex = $_POST["mem_sex"];
    $mem_birth = $_POST["mem_birth"];
    $mem_tel = $_POST["mem_tel"];
    $mem_post = $_POST["mem_post"];
    $mem_pref = $_POST["mem_pref"];
    $mem_city = $_POST["mem_city"];
    $mem_add = $_POST["mem_add"];
    $mem_mail = $_POST["mem_mail"];
    $mem_pass = $_POST["mem_pass"];
}

include("../../mysqlenv.php");

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

    $SQL = "insert into t_member";
    $SQL .= " values('".$mem_mail."', '".$mem_pass."', '".$mem_fk."', '".$mem_gk."', '".$mem_ff."', '".$mem_gk."', '".$mem_sex."', '".$mem_birth."', '".$mem_post."', '".$mem_pref."', '".$mem_city."', '".$mem_add."', '".$mem_tel."', now())";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
    }

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../../head.php"); ?>
<body class="account_create_ex">
    <div id="wrapper">
        <div id="contents">
            <p id="pan"><span class="pan_padding">会員情報の入力</span><span>&gt;</span><span class="pan_padding">会員情報の確認</span><span>&gt;</span><span id="now" class="pan_padding">登録完了</span></p>
                <h1>会員登録が完了しました。</h1>
                <a href="../../index.php">トップページへ戻る</a>
        </div>
    </div>
</body>
</html>
