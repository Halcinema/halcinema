<?php include ("login_session.php"); ?>
<?php
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定
//処理部

?>


<?php
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定

//処理部

/*
if(isset($_POST["house_num"])){
    $house_num = $_POST["house_num"];

*/


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
$MO = "select * from t_movie";
$MO .= " where movie_start <= now() and movie_finish >= now()";
if(!$GuSqlRes = mysqli_query($Link,$MO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $MO);
}

//  連想配列への抜出（全件配列に格納）
while($GuRow = mysqli_fetch_array($GuSqlRes)){
  //  データが存在する間処理される
  $GuRowAry[] = $GuRow;
}


//  抜き出されたレコード件数を求める
$GuNumRows = mysqli_num_rows($GuSqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($GuSqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


?>







<!DOCTYPE html>
<html lang="ja">
<html>
<head>
<meta charset="utf-8"/>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/sub_common.css" rel="stylesheet" type="text/css" />
<link href="css/movie.css" rel="stylesheet" type="text/css" />
<title>上映中の映画</title>
</head>

<body>
<?php include("header.php"); ?>
        <div id="wrapper" style="width:1000px;">
  <!--<div id="button"> <a href="movie_now.php" class="change">上映中の映画>></a><a href="movie_schedule.php" class="change">公開予定の映画>></a> </div>-->
<h1 class="page_name">上映中の映画</h1>
<section class="clearfix" style="width:1000px;">
  <div id="movie_contents">
      
      <?php for($i=0;$i<$GuNumRows;$i++){ ?>
      
    <div class="movie_block" aria-haspopup="true">
      <div class="movie_gazou"> <img src="../admin/images/<?php print $GuRowAry[$i]["movie_file"]; ?>" width="200px"> </div>
      <div class="movie_text">
        <h2 class="movie_contents"><?php print $GuRowAry[$i]["movie_name"]; ?></h2>
        <ul class="info_movie">
          <li class="info_left">監督</li>
          <li class="info_right"><?php print $GuRowAry[$i]["movie_sc"]; ?></li>
          <li class="info_left">キャスト</li>
          <li class="info_right"><?php print $GuRowAry[$i]["movie_cast"]; ?></li>
          <li class="info_left">レイティング</li>
          <li class="info_right"><?php print $GuRowAry[$i]["movie_rating"]; ?></li>
          <li class="info_left">備考</li>
          <li class="info_right"><?php print $GuRowAry[$i]["movie_note"]; ?></li>
          <li class="info_left" style="background-color:white;color:orangered;border:1px solid orangered;box-sizing:border-box;opacity:1;">公開中</li>
          <li class="info_right"><?php print date('Y年n月j日', strtotime($GuRowAry[$i]["movie_finish"])); ?>まで公開</li>
        </ul>
      </div>
      <a href="movie_detail.php?num=<?php print $GuRowAry[$i]["movie_num"]; ?>" aria-haspopup="false">
      <div class="detail_button"> 詳細 </div>
    </a>
    </div>
      
      <?php } ?>
      
    </div>
</section>
    </div>
</body>
