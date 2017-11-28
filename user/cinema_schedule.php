<?php
include "login_session.php";
$pageTitle = "HALシネマ-上映スケジュール";
$theNum = "";
if(isset($_GET["the_num"])){
    $theNum = $_GET["the_num"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../head.php"); ?>
    <body>
        <div id="wrapper">
        <?php include("header.php"); ?>
        <main class="cinema_schedule">
            <h2 class="cinema_schedule_ttl">上映スケジュール／<span class="cinema_schedule_ttl_num"><?php print $theNum; ?></span><span class="theater_name"></span></h2>
            <ul class="cinema_schedule_days">
                <li class="cinema_schedule_days_item" id="selected">
                    <span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day2_month"></span>月<span class="day2_day"></span>日（<span class="day2_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day3_month"></span>月<span class="day3_day"></span>日（<span class="day3_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day4_month"></span>月<span class="day4_day"></span>日（<span class="day4_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day5_month"></span>月<span class="day5_day"></span>日（<span class="day5_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day6_month"></span>月<span class="day6_day"></span>日（<span class="day6_day_of_week"></span>）
                </li>
                <li class="cinema_schedule_days_item">
                    <span class="day7_month"></span>月<span class="day7_day"></span>日（<span class="day7_day_of_week"></span>）
                </li>
            </ul>
            <h3 class="cinema_schedule_selected"><span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）</h3>
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
    </main>
    </div><!--/#wrapper-->
	</body>

</html>
