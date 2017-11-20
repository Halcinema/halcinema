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
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報_予約情報の詳細</title>
</head>

<body>

<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>


<h2><?php print htmlspecialchars($MemName); ?>さんの会員ページ</h2>
 <div id="mypage_nav">
  <ul>
   <li><a href="YYKtyuu_mypage.php">あなたの予約情報</a></li>
   <li><a href="Coupon_mypage.php">クーポン一覧</a></li>
   <li><a href="MLMG_mypage.php">メールマガジン</a></li>
   <li><a href="Review_mypage.php">レビュー履歴</a></li>
   <li><a href="KAIINN_mypage.php">会員情報</a></li>
  </ul>
 </div>
 
 <div id="contents">
 <h3>あなたの会員情報</h3>
 
 <div id="KAIINN">
 
  <table border="0">
   <tr>
    <td id="hutoi">メールアドレス　　　　</td><td><?php print htmlspecialchars($RowAry[0]["mem_mail"]); ?></td>
   </tr>
   <tr>
    <td id="hutoi">名前　</td><td><ruby><?php print htmlspecialchars($RowAry[0]["mem_fk"]); ?><rt><?php print htmlspecialchars($RowAry[0]["mem_ff"]); ?></rt></ruby>　<ruby><?php print htmlspecialchars($RowAry[0]["mem_gk"]); ?><rt><?php print htmlspecialchars($RowAry[0]["mem_gf"]); ?></rt></ruby></td>
   </tr>
   <tr>
    <td id="hutoi">性別　</td>
    <td>
    <?php
      if($RowAry[0]["mem_sex"] == 1){
         print "男";
      }else{
         print "女";
      }
    ?>
    </td>
   </tr>
   <tr>
    <td id="hutoi">生年月日　</td><td><?php echo date('Y',strtotime($RowAry[0]["mem_birth"]))."年 ",date('m',strtotime($RowAry[0]["mem_birth"]))."月 ",date('d',strtotime($RowAry[0]["mem_birth"]))."日";  ?></td>
   </tr>
   <tr>
    <td id="hutoi">郵便番号　</td><td>〒<?php print $RowAry[0]["mem_post"]; ?></td>
   </tr>
   <tr>
    <td id="hutoi">住所　</td><td><?php echo $RowAry[0]["mem_pref"],$RowAry[0]["mem_city"],$RowAry[0]["mem_add"] ?></td>
   </tr>
   <tr>
    <td id="hutoi">電話番号　</td><td><?php print substr($RowAry[0]["mem_tel"],0,3); ?><?php print substr($RowAry[0]["mem_tel"],3,3); ?><?php print substr($RowAry[0]["mem_tel"],6,4); ?></td>
   </tr>
  </table>
  
  <hr />
  <br />
  <h3>会員オプション</h3>
	 <p><a href="checkpass1_mypage.php">変更する</a></p>
  <p><a href="checkpass2_mypage.php">退会する</a></p>
  
 </div>
 
	 <div id="top"><a href="#wrapper">TOPへ</a></div>
  
 </div>

</div>

</body>
</html>
