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
        <div id="wrapper">
<h1 class="page_name">上映中の映画</h1>
<section class="clearfix">
  <div id="button"> <a href="movie_now.php" class="change">上映中の映画>></a><a href="movie_schedule.php" class="change">公開予定の映画>></a> </div>
  <div id="movie_contents"> <a href="movie_detail1.php">
    <div class="movie_block">
      <div class="movie_gazou"> <img src="images/hoshi.jpg" width="200px"> </div>
      <div class="movie_text">
        <h2 class="movie_contents">美しい星</h2>
        <ul class="info_movie">
          <li class="info_left">監督</li>
          <li class="info_right">吉田大八</li>
          <li class="info_left">キャスト</li>
          <li class="info_right">リリー・フランキー、亀梨和也</li>
          <li class="info_left">レイティング</li>
          <li class="info_right">指定なし</li>
          <li class="info_left">備考</li>
          <li class="info_right">(C)2017「美しい星」製作委員会</li>
          <li class="info_left">公開期間</li>
          <li class="info_right">〇月〇日まで公開</li>
        </ul>
      </div>
      <div class="detail_button"> 詳細へ </div>
    </div>
    </a> <a href="movie_detail2.php">
    <div class="movie_block">
      <div class="movie_gazou"> <img src="images/bijo_yaju.jpg" width="200px"> </div>
      <div class="movie_text">
        <h2 class="movie_contents">美女と野獣</h2>
        <ul class="info_movie">
          <li class="info_left">監督</li>
          <li class="info_right">ビル・コンドン</li>
          <li class="info_left">キャスト</li>
          <li class="info_right">エマ・ワトソン、ダン・スティーブンス</li>
          <li class="info_left">レイティング</li>
          <li class="info_right">指定なし</li>
          <li class="info_left">備考</li>
          <li class="info_right">(C)2016 Disney. All Rights Reserved.</li>
          <li class="info_left">公開期間</li>
          <li class="info_right">〇月〇日まで公開</li>
        </ul>
      </div>
      <div class="detail_button"> 詳細へ </div>
    </div>
    </a>
    </div>
</section>
    </div>
</body>
