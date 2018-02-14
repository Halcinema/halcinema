<?php Include("mypage_session.php") ?>
<?php
$res_num = $_GET["res_num"];

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
 
 select res_num, t_show.show_id, movie_name, the_name, show_start, show_finish, scr_name, res_seat, t_ticket.ticket_price
 from 
 ((((t_reservation inner join t_show on t_reservation.show_id = t_show.show_id)
 inner join t_movie on t_show.movie_num = t_movie.movie_num)
 inner join t_screen on t_show.scr_id = t_screen.scr_id)
 inner join t_theater on t_screen.the_num = t_theater.the_num)
 inner join t_ticket on t_ticket.ticket_num = t_reservation.ticket_num
 where mem_mail = 'test@hal.ac.jp' and t_reservation.res_num = '1';
***********************************************************************************/

$SQL =  " select res_num,t_reservation.show_id,movie_name,the_name,show_start,show_finish,scr_name,res_seat,t_ticket.ticket_price";
$SQL .= " from";
$SQL .= " ((((t_reservation inner join t_show on t_reservation.show_id = t_show.show_id)";
$SQL .= " inner join t_movie on t_show.movie_num = t_movie.movie_num)";
$SQL .= " inner join t_screen on t_show.scr_id = t_screen.scr_id)";
$SQL .= " inner join t_theater on t_screen.the_num = t_theater.the_num)";
$SQL .= " inner join t_ticket on t_ticket.ticket_num = t_reservation.ticket_num";
$SQL .= " where mem_mail = '". $MemMail ."' and t_reservation.res_num = '". $res_num ."' ";



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

$RowAry[0]["res_num"]
$RowAry[0]["show_id"]
$RowAry[0]["movie_name"]
$RowAry[0]["the_name"]
$RowAry[0]["show_start"]
$RowAry[0]["show_finish"]
$RowAry[0]["scr_name"]
$RowAry[0]["res_seat"]
$RowAry[0]["ticket_price"]
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

//合計金額の計算
$goukei = 0;
$goukei = $goukei + $RowAry[0]["ticket_price"];

?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link href="css/mypage/mypage_YYKsyousai.css" rel="stylesheet" type="text/css">
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報_予約情報の取り消し確認</title>
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
 <h3>予約情報の取り消し確認</h3>
 
 <div id="YYKsyousai">
 <h4><?php print htmlspecialchars($RowAry[0]["movie_name"]); ?></h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  
  <table border="0">
   <tr>
    <td id="hutoi">上映場所</td><td>HALシネマ<?php print htmlspecialchars($RowAry[0]["movie_name"]); ?></td>
   </tr>
   <tr>
    <td id="hutoi">上映日時</td><td><?php echo date('Y',strtotime($RowAry[0]["show_start"]))."年".date('m',strtotime($RowAry[0]["show_start"]))."月".date('d',strtotime($RowAry[0]["show_start"]))."日　".date('H',strtotime($RowAry[0]["show_start"]))."時".date('i',strtotime($RowAry[0]["show_start"]))."分～".date('H',strtotime($RowAry[0]["show_finish"]))."時".date('i',strtotime($RowAry[0]["show_finish"]))."分"; ?></td>
	  </tr>
   <tr>
    <td id="hutoi">上映スクリーン</td><td><?php print htmlspecialchars($RowAry[0]["scr_name"]); ?></td>
   </tr>
   <tr>
    <td id="hutoi">予約した席記号</td>
    <td>
    <?php print htmlspecialchars($RowAry[0]["res_seat"]); ?>
    </td>
    
   </tr>
   <tr>
    <td id="hutoi">グッズ</td><td>ぬいぐるみ　0000円<br />パンフレット　0000円<br /></td>
   </tr>
   <tr>
    <td id="hutoi">ドリンク・フード</td><td>オレンジジュース　0000円<br />ポップコーンL　0000円<br /></td>
   </tr>
   <tr>
    <td id="hutoi">合計金額</td><td><?php print $goukei; ?>円</td>
   </tr>
   <tr>
    <td id="hutoi">支払方法</td><td>クレジットカード</td>
   </tr>
  </table>
  
  <div id="YYkdel">
  <h4>上記の予約情報を取り消します。本当によろしいですか？</h4>
  <p>[ ご注意 ]　「取り消す」をクリックすると、予約情報が取り消されます。</p>
  <form action="YYKdelSYORI_mypage.php" method="GET">
  <input type="submit" id="submit" value="取り消す" />
  <input type="hidden" name="res_num" value="<?php print $res_num; ?>" />
  </form>
  </div>
  
 </div>
 
  <div id="top"><p><a href="YYKsyousai_mypage.php?show_id=<?php print $show_id; ?>">戻る</a></p></div>
  <div id="top"><a href="#wrapper">TOPへ</a></div>
  
  
 </div>

</div>

</body>
</html>
