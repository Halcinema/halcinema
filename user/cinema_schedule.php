<?php
include "login_session.php";
$pageTitle = "上映スケジュール";
$theNum = "";
if(isset($_GET["the_num"])){
    $theNum = $_GET["the_num"];
}
if(isset($_POST["the_num"])){
    $theNum = $_POST["the_num"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/user/header.php"); ?>
    <main class="cinema_schedule">
        <h2 class="cinema_schedule_ttl">上映スケジュール／<span class="cinema_schedule_ttl_num"><?= $theNum ?></span>
            <?php if($theNum == '1'): ?>
                東京
            <?php elseif($theNum == '2'): ?>
                名古屋
            <?php elseif($theNum == '3'): ?>
                大阪
            <?php endif; ?>
        </h2>
        <ul class="cinema_schedule_days">
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day1" id="selected">
                <span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day2">
                <span class="day2_month"></span>月<span class="day2_day"></span>日（<span class="day2_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day3">
                <span class="day3_month"></span>月<span class="day3_day"></span>日（<span class="day3_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day4">
                <span class="day4_month"></span>月<span class="day4_day"></span>日（<span class="day4_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day5">
                <span class="day5_month"></span>月<span class="day5_day"></span>日（<span class="day5_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day6">
                <span class="day6_month"></span>月<span class="day6_day"></span>日（<span class="day6_day_of_week"></span>）
            </li>
            <li class="cinema_schedule_days_item cinema_schedule_days_item_day7">
                <span class="day7_month"></span>月<span class="day7_day"></span>日（<span class="day7_day_of_week"></span>）
            </li>
        </ul>
        <h3 class="cinema_schedule_selected"><span class="day1_month"></span>月<span class="day1_day"></span>日（<span class="day1_day_of_week"></span>）</h3>
        <div class="cinema_schedule_ajax"></div>
    </main>
</body>
</html>
