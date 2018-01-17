<?php
$pageTitle = "登録完了 | 新規会員登録";
$mem_name_kanji = "";
$mem_name_furigana = "";
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
    $mem_name_kanji = $_POST["mem_name_kanji"];
    $mem_name_furigana = $_POST["mem_name_furigana"];
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

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/mysqlenv.php');

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
    $SQL .= " values('".$mem_mail."', '".$mem_pass."', '".$mem_name_kanji."', '".$mem_name_furigana."', '".$mem_sex."', '".$mem_birth."', '".$mem_post."', '".$mem_pref."', '".$mem_city."', '".$mem_add."', '".$mem_tel."', now())";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
    }

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

session_start();
$_SESSION["MemMail"] = $mem_mail;
$_SESSION["MemName"] = $mem_name_kanji;
?>
<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="ac">
    <ul class="ac-breadcrumbs">
        <li class="ac-breadcrumbs__item">会員情報の入力</li>
        <li class="ac-breadcrumbs__item">会員情報の確認</li>
        <li class="ac-breadcrumbs__item ac-breadcrumbs__item--now">登録完了</li>
    </ul>
        <h1 class="ac__title">会員登録が完了しました。</h1>
        <a href="/halcinema/user/">トップページへ戻る</a>
</body>
</html>
