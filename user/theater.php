<?php include "login_session.php" ?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>HALシネマ-劇場一覧</title>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/theater.css">
	</head>
	<body>
	    <div id="wrapper">
	    <?php include("header.php"); ?>
	        <h2>劇場一覧</h2>
			<div id="theaters">
				<section>

				   <img src="images/theater01.jpg">
	        <h3>HALシネマ東京</h3>
				    <div class="detail">
					<div class="next_btn"><a href="cinema_schedule.php?the_num=1">上映作品</a></div>
					<div class="next_btn"><a href="theater_guide.php?the_num=1">劇場案内</a></div>
<!--
						<dl>
							<dt>開場時間:</dt>
							<dd>09:00~23:00</dd>
							<dt>電話番号:</dt>
							<dd>050-6868-5014</dd>
							<dd>（24時間自動音声案内・お客様お問い合わせ・FAXサービス）</dd>
							<dt>住所:</dt>
							<dd>愛知県名古屋市中村区</dd>
							<dt>駐車場:</dt>
							<dd>約５００台</dd>
						</dl>
-->
				    </div>
				</section>
				<section>
						<img src="images/theater01.jpg">
			        <h3>HALシネマ名古屋</h3>
						<div class="detail">
							<div class="next_btn"><a href="cinema_schedule.php?the_num=2">上映作品</a></div>
							<div class="next_btn"><a href="theater_guide.php?the_num=2">劇場案内</a></div>
					 </div>
				</section>
				<section>
				      <img src="images/theater01.jpg">
			        <h3>HALシネマ大阪</h3>
						<div class="detail">
							<div class="next_btn"><a href="cinema_schedule.php?the_num=3">上映作品</a></div>
							<div class="next_btn"><a href="theater_guide.php?the_num=3">劇場案内</a></div>
					 </div>
				</section>
			</div>
	    </div>
	</body>

</html>
