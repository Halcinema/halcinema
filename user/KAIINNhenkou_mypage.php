<?php Include("mypage_session.php") ?>

<?php
//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("mysqlenv.php");

//  MySQLとの接続開始
if(!$Link = mysqli_connect
            ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー<br />" . 
    mysqli_connect_error());
}

//  クエリー送信(文字コード)
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        $SQL);
}

//  MySQLデータベース選択
if(!mysqli_select_db($Link,$DB)){
  //  MySQLデータベース選択失敗
  exit("MySQLデータベース選択エラー<br />" .
        $DB);
}
//  クエリー送信(選択クエリー)
$SQL = "select * from t_member where mem_mail = '". $MemMail ."'";
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（全件配列に格納）
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry[] = $Row;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["mem_mail"]
$RowAry[0]["mem_pass"]
$RowAry[0]["mem_name_kanji"]
$RowAry[0]["mem_name_furigana"]
$RowAry[0]["mem_sex"]
$RowAry[0]["mem_birth"]
$RowAry[0]["mem_post"]
$RowAry[0]["mem_pref"]
$RowAry[0]["mem_city"]
$RowAry[0]["mem_add"]
$RowAry[0]["mem_tel"]
$RowAry[0]["mem_reg"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


//データベースから出したデータを格納
  $mail              = $RowAry[0]["mem_mail"];
  $pass              = $RowAry[0]["mem_pass"];
  $mem_name_kanji    = $RowAry[0]["mem_name_kanji"];
  $mem_name_furigana = $RowAry[0]["mem_name_furigana"];
  $yuubinn1          = substr($RowAry[0]["mem_post"],0,3);
  $yuubinn2          = substr($RowAry[0]["mem_post"],4,4);
  $ken               = $RowAry[0]["mem_pref"];
  $tyou              = $RowAry[0]["mem_city"];
  $banchi            = $RowAry[0]["mem_add"];
  $denwa             = $RowAry[0]["mem_tel"];


//入力チェックからの値の受け取り
if(isset($_GET["mail"])){
  $mail              = $_GET["mail"];
  $pass              = $_GET["pass"];
  $mem_name_kanji    = $_GET["mem_name_kanji"];
  $mem_name_furigana = $_GET["mem_name_furigana"];
  $yuubinn1          = $_GET["yuubinn1"];
  $yuubinn2          = $_GET["yuubinn2"];
  $ken               = $_GET["ken"];
  $tyou              = $_GET["tyou"];
  $banchi            = $_GET["banchi"];
  $denwa             = $_GET["denwa"];
  
  $EMmail              = $_GET["EMmail"];
  $EMpass              = $_GET["EMpass"];
  $EMmem_name_kanji    = $_GET["EMmem_name_kanji"];
  $EMmem_name_furigana = $_GET["EMmem_name_furigana"];
  $EMyuubinn           = $_GET["EMyuubinn"];
  $EMken               = $_GET["EMken"];
  $EMtyou              = $_GET["EMtyou"];
  $EMbanchi            = $_GET["EMbanchi"];
  $EMdenwa             = $_GET["EMdenwa"];
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_KAIINN.css" />
<link rel="stylesheet" href="css/mypage/mypage_KAIINNhenkou.css" />
<link rel="stylesheet" href="css/mypage/mypage_KAIINNhenkou2.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報_予約情報の変更</title>
</head>

<body>

<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>

 
 <h2><?php print htmlspecialchars($MemName); ?>さんの会員ページ</h2>

 <div id="contents">
 <h3>会員情報の変更</h3>
 
 <div id="KAIINN">
 
 <form action="KAIINNhenkouSYORI_mypage.php" method="GET">
  <table border="0">
   <tr>
    <td>メールアドレス</td><td><input type="text" name="mail" id="mail" value="<?php if(isset($mail)){ print htmlspecialchars($mail); }else{ print htmlspecialchars($RowAry[0]["mem_mail"]); } ?>" /><div id="err"><?php if(isset($EMmail)){ print htmlspecialchars($EMmail); } ?></div></td>
   </tr>
   <tr>
    <td>パスワード(英数字のみ)</td><td><input type="password" name="pass" id="pass" value="<?php print htmlspecialchars($pass); ?>" /><div id="err"><?php if(isset($EMpass)){ print htmlspecialchars($EMpass); } ?></div></td>
   </tr>
   <tr>
    <td>名前</td><td><input type="text" name="mem_name_kanji" id="mem_name_kanji" value="<?php print htmlspecialchars($mem_name_kanji); ?>" /><div id="err"><?php if(isset($EMmem_name_kanji)){ print htmlspecialchars($EMmem_name_kanji); } ?></div></td>
   </tr>
   <tr>
    <td>名前(フリガナ)</td><td><input type="text" name="mem_name_furigana" id="mem_name_furigana" value="<?php print htmlspecialchars($mem_name_furigana) ?>" /><div id="err"><?php if(isset($EMmem_name_furigana)){ print htmlspecialchars($EMmem_name_furigana); } ?></div></td>
   </tr>
   <tr>
    <td>性別</td>
    <td>
    <?php
       if($RowAry[0]["mem_sex"] == 1){
           print '男（変更出来ません）';
       }else{
           print '女（変更出来ません）';
       }
    ?>
    </td>
   </tr>
   <tr>
    <td>生年月日</td><td><?php print date('Y',strtotime($RowAry[0]["mem_birth"])); ?> 年 <?php print date('m',strtotime($RowAry[0]["mem_birth"])); ?> 月 <?php print date('d',strtotime($RowAry[0]["mem_birth"])); ?> 日 (変更出来ません)</td>
   </tr>
   <tr>
    <td>郵便番号</td><td>〒 <input type="text" name="yuubinn1" id="yuubinn1" value="<?php print $yuubinn1; ?>" /> - <input type="text" name="yuubinn2" id="yuubinn2" value="<?php print $yuubinn2; ?>" /><div id="err"><?php if(isset($EMyuubinn)){ print htmlspecialchars($EMyuubinn); } ?></div></td>
   </tr>
   <tr>
    <td>住所(県)</td><td><input type="text" name="ken" id="ken" value="<?php print $ken; ?>" /><div id="err"><?php if(isset($EMken)){ print htmlspecialchars($EMken); } ?></div></td>
   </tr>
   <tr>
    <td>住所(市)</td><td><input type="text" name="tyou" id="tyou" value="<?php print $tyou; ?>" /><div id="err"><?php if(isset($EMtyou)){ print htmlspecialchars($EMtyou); } ?></div></td>
   </tr>
   <tr>
    <td>住所（番地以降）</td><td><input type="text" name="banchi" id="banchi" value="<?php print $banchi; ?>" /><div id="err"><?php if(isset($EMbanchi)){ print htmlspecialchars($EMbanchi); } ?></div></td>
   </tr>
   <tr>
    <td>電話番号（英数字のみ、ハイフンなし）</td><td><input type="text" name="denwa" id="denwa" value="<?php print $denwa; ?>" /><div id="err"><?php if(isset($EMdenwa)){ print htmlspecialchars($EMdenwa); } ?></div></td>
   </tr>
  </table>
  
  <hr />
  
  <h3>上記の内容に変更します。よろしいですか？</h3>
  <p>[ ご注意 ]　「変更する」をクリックすると、上記の会員情報に変更されます。</p>
  <input type="hidden" name="MemMail" id="MemMail" value="<?php print $RowAry[0]["mem_mail"]; ?>" />
  <input type="submit" id="submit" value="変更する" />
  
  </form>
  
 </div>
 
	 <div id="top"><a href="KAIINN_mypage.php">戻る</a></div>
	 <div id="top"><a href="#wrapper">TOPへ</a></div>
  
 </div>

</div>

</body>
</html>
