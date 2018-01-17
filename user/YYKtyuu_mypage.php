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

/**********************************************************************************
[テーブル結合]
 
 select distinct t_show.show_id,movie_name,the_name,show_start,show_finish,scr_name
 from 
 (((t_reservation inner join t_show on t_reservation.show_id = t_show.show_id)
 inner join t_movie on t_show.movie_num = t_movie.movie_num)
 inner join t_screen on t_show.scr_id = t_screen.scr_id)
 inner join t_theater on t_screen.the_num = t_theater.the_num
 where mem_mail = 'test@hal.ac.jp' and show_finish > now();
 
 映画名:[t_movie movie_name]
 上映場所：[t_theater the_name]
 上映時間：[t_show show_start～show_finish]
 上映スクリーン：[t_screen scr_name]
 予約席:[t_reservation res_seat]
***********************************************************************************/

$SQL =  " select distinct t_reservation.show_id,movie_name,the_name,show_start,show_finish,scr_name";
$SQL .= " from";
$SQL .= " (((t_reservation inner join t_show on t_reservation.show_id = t_show.show_id)";
$SQL .= " inner join t_movie on t_show.movie_num = t_movie.movie_num)";
$SQL .= " inner join t_screen on t_show.scr_id = t_screen.scr_id)";
$SQL .= " inner join t_theater on t_screen.the_num = t_theater.the_num";
$SQL .= " where mem_mail = '". $MemMail ."' and show_finish > now()";


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

$RowAry[0]["show_id"]
$RowAry[0]["movie_name"]
$RowAry[0]["the_name"]
$RowAry[0]["show_start"]
$RowAry[0]["show_finish"]
$RowAry[0]["scr_name"]
$RowAry[0]["res_seat"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);


$SQL = "select show_id,res_seat from t_reservation where mem_mail = '". $MemMail ."'";

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（全件配列に格納）
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry2[] = $Row;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry2[0]["show_id"]
$RowAry2[0]["res_seat"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows2 = mysqli_num_rows($SqlRes);

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
<link rel="stylesheet" href="css/mypage/mypage_YYKrireki.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報</title>
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
 <h3>あなたの予約情報(予約履歴)</h3>
 
 <div id="YYKswitch">
  
	 <span style="background-color:#7BF6FF;"><a href="YYKtyuu_mypage.php">予約中の上映映画</a></span>
   <span><a href="YYKrireki_mypage.php">予約履歴</a></span>
   
 </div>
 
 <div id="page">
   <span><a href="#">前のページ</a></span>
   <span>1/1</span>
   <span><a href="#">次のページ</a></span>
 </div>
  
  <div id="kensuu">
  <p>予約中の上映映画件数：<?php print $NumRows; ?>件</p>
  </div>
  
<?php if($NumRows == 0){ ?>

<div id="eiga2"><p>予約中の上映映画はありません。</p></div>

<?php }else{ ?>
  
<?php for($i=0; $i<$NumRows; $i++){ ?>
  
  <div id="eiga">
  <h4><?php print $RowAry[$i]["movie_name"]; ?></h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>上映場所：HALシネマ<?php print $RowAry[$i]["the_name"]; ?></p>
  <p>上映日時：<?php echo date('Y',strtotime($RowAry[$i]["show_start"]))."年".date('m',strtotime($RowAry[$i]["show_start"]))."月".date('d',strtotime($RowAry[$i]["show_start"]))."日　".date('H',strtotime($RowAry[$i]["show_start"]))."時".date('i',strtotime($RowAry[$i]["show_start"]))."分～".date('H',strtotime($RowAry[$i]["show_finish"]))."時".date('i',strtotime($RowAry[$i]["show_finish"]))."分"; ?></p>
  <p>上映スクリーン：<?php print $RowAry[$i]["scr_name"]; ?></p>
  <p>予約席：
  <?php
  	for($ii=0; $ii<$NumRows2; $ii++){
  		if($RowAry2[$ii]["show_id"] == $RowAry[$i]["show_id"]){
  			print $RowAry2[$ii]["res_seat"]."　";
  		}
  	}
  ?>
  </p>
	  <div id="syousai_miru"><p><a href="YYKsyousai_mypage.php">詳細を見る</a></p></div>
  </div>
  
<?php } ?>

<?php } ?>
  
 <div id="page">
   <span><a href="#">前のページ</a></span>
   <span>1/1</span>
   <span><a href="#">次のページ</a></span>
 </div>
  
  
  <div id="top"><a href="#wrapper">TOPへ</a></div>
  
 </div>

</div>
 

</body>
</html>
