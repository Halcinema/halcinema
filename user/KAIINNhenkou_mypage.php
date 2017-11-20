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
$RowAry[0]["mem_fk"]
$RowAry[0]["mem_gk"]
$RowAry[0]["mem_ff"]
$RowAry[0]["mem_gf"]
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
 
 <form action="KAIINNhenkouSYORI_mypage.php" method="post">
  <table border="0">
   <tr>
    <td>メールアドレス</td><td><input type="text" name="mail" id="mail" value="<?php print htmlspecialchars($RowAry[0]["mem_mail"]); ?>" /></td>
   </tr>
   <tr>
    <td>パスワード</td><td><input type="password" name="pass" id="pass" value="<?php print htmlspecialchars($RowAry[0]["mem_pass"]); ?>" /></td>
   </tr>
   <tr>
    <td>姓</td><td><input type="text" name="myouji" id="myouji" value="<?php print htmlspecialchars($RowAry[0]["mem_fk"]); ?>" /></td>
   </tr>
   <tr>
    <td>姓(フリガナ)</td><td><input type="text" name="myouji_huri" id="myouji_hurigana" value="<?php print htmlspecialchars($RowAry[0]["mem_ff"]); ?>" /></td>
   </tr>
   <tr>
    <td>名</td><td><input type="text" name="name" id="name" value="<?php print htmlspecialchars($RowAry[0]["mem_gk"]); ?>" /></td>
   </tr>
   <tr>
    <td>名(フリガナ)</td><td><input type="text" name="name_huri" id="name_hurigana" value="<?php print htmlspecialchars($RowAry[0]["mem_gf"]); ?>" /></td>
   </tr>
   <tr>
    <td>性別</td>
    <td>
    <?php
       if($RowAry[0]["mem_sex"] == 1){
           print '男 <input type="radio" name="sex" id="sex" value="男" checked />　　女 <input type="radio" name="sex" id="sex" value="女" />';
       }else{
           print '男 <input type="radio" name="sex" id="sex" value="男" />　　女 <input type="radio" name="sex" id="sex" value="女" checked />';
       }
    ?>
    </td>
   </tr>
   <tr>
    <td>生年月日</td><td><input type="text" name="nen" id="nen" value="<?php print date('Y',strtotime($RowAry[0]["mem_birth"])); ?>"> 年 <input type="text" name="getu" id="getu" size="5" value="<?php print date('m',strtotime($RowAry[0]["mem_birth"])); ?>"> 月 <input type="text" name="niti" id="niti" value="<?php print date('d',strtotime($RowAry[0]["mem_birth"])); ?>">日 </td>
   </tr>
   <tr>
    <td>郵便番号</td><td>〒 <input type="text" name="yuubinn1" id="yuubinn1" value="<?php print substr($RowAry[0]["mem_post"],0,3); ?>" /> - <input type="text" name="yuubinn2" id="yuubinn2" value="<?php print substr($RowAry[0]["mem_post"],4,4); ?>" /></td>
   </tr>
   <tr>
    <td>住所(県)</td><td><input type="text" name="ken" id="ken" value="<?php print $RowAry[0]["mem_pref"]; ?>" /></td>
   </tr>
   <tr>
    <td>住所(市)</td><td><input type="text" name="tyou" id="tyou" value="<?php print $RowAry[0]["mem_city"]; ?>" /></td>
   </tr>
   <tr>
    <td>住所（番地以降）</td><td><input type="text" name="banchi" id="banchi" value="<?php print $RowAry[0]["mem_add"]; ?>" /></td>
   </tr>
   <tr>
    <td>電話番号</td><td><input type="text" name="denwa" id="denwa" value="<?php print $RowAry[0]["mem_tel"]; ?>" /></td>
   </tr>
  </table>
  
  <hr />
  
  <h3>上記の内容に変更します。よろしいですか？</h3>
  <p>[ ご注意 ]　「変更する」をクリックすると、上記の会員情報に変更されます。</p>
  <input type="submit" id="submit" value="変更する" />
  
  </form>
  
 </div>
 
	 <div id="top"><a href="KAIINN_mypage.php">戻る</a></div>
	 <div id="top"><a href="#wrapper">TOPへ</a></div>
  
 </div>

</div>

</body>
</html>
