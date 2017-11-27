<?php include "login_session.php" ?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>HALシネマ-上映スケジュール</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/cinema_schedule.css">
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/cinema_schedule.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php include("header.php") ?>
		</div>
		<h2>名古屋シネマズ　上映スケジュール</h2>
		<div class="schedule">
			<div class="s_days" id="selected">
			<a href="">
				<p><span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day2_month"></span>月<span class="day2_day"></span>日（<span class="day2_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day3_month"></span>月<span class="day3_day"></span>日（<span class="day3_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day4_month"></span>月<span class="day4_day"></span>日（<span class="day4_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day5_month"></span>月<span class="day5_day"></span>日（<span class="day5_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day6_month"></span>月<span class="day6_day"></span>日（<span class="day6_day_of_week"></span>）</p>
			</a>
			</div>
			<div class="s_days">
			<a href="">
				<p><span class="day7_month"></span>月<span class="day7_day"></span>日（<span class="day7_day_of_week"></span>）</p>
			</a>
			</div>
		</div>
		<h3><span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）</h3>
		<section class="s_cinema">
			<h4 class="cinema_title">名探偵コナン から紅の恋歌 DETECTIVE CONAN 2017</h4>
			<div class="screen">
				<h5 class="screen_num">Screen1</h5>
				<div class="screens">
					<div class="s_screen">
							<a href="ticket/select_seat.php?ShowId=201707142000101">
							<div class="cinema_time"><span>20:00</span>〜22:00</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
					<div class="s_screen">
							<a href="#">
							<div class="cinema_time"><span>17:30</span>〜19:30</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
				</div>
			</div>
			</div>
			<div class="screen">
				<h5 class="screen_num">Screen2</h5>
				<div class="screens">
					<div class="s_screen">
							<a href="#">
							<div class="cinema_time"><span>15:30</span>〜17:30</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
					<div class="s_screen">
							<a href="#">
							<div class="cinema_time"><span>15:30</span>〜17:30</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
				</div>
			</div>

		</section>
				<section class="s_cinema">
			<h4 class="cinema_title">いつまた、君と　何日君再来（ホーリージュンザイライ）</h4>
			<div class="screen">
				<h5 class="screen_num">Screen1</h5>
				<div class="screens">
					<div class="s_screen">
							<a href="#">
							<div class="cinema_time"><span>15:30</span>〜17:30</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
					<div class="s_screen">
							<a href="#">
							<div class="cinema_time"><span>17:30</span>〜19:30</div>
							<!-- sa = situation-->
							<div class="seat_si">座席余裕あり</div>
							</a>
					</div>
				</div>
			</div>
		</section>

	</body>

</html>
