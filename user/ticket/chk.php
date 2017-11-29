<?php
include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "購入内容の確認 | 予約";
if(isset($_POST["pay"])){
    $pay = $_POST["pay"];
    $_SESSION["pay"] = $pay;
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="chk">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>購入内容をご確認ください。</h2>
                <section class="chk_section">
                    <h3 class="chk_section_ttl">上映情報</h3>
                    <p class="chk_section_list">
                        <span class="chk_section_list_item">作品：<?php print $_SESSION["ticket_status"]["movie_name"]; ?></span>
                        <span class="chk_section_list_item">入場可能日時：<?php print $_SESSION["ticket_status"]["show_enter"]; ?></span>
                        <span class="chk_section_list_item">上映開始日時：<?php print $_SESSION["ticket_status"]["show_start"]; ?></span>
                        <span class="chk_section_list_item">上映終了日時：<?php print $_SESSION["ticket_status"]["show_finish"]; ?></span>
                        <span class="chk_section_list_item">劇場：<?php print $_SESSION["ticket_status"]["the_name"]; ?></span>
                        <span class="chk_section_list_item">スクリーン：<?php print $_SESSION["ticket_status"]["scr_name"]; ?></span>
                    </p>
                </section>
                <section class="chk_section">
                    <h3 class="chk_section_ttl">座席・券種情報</h3>
                    <p class="chk_section_list">
                        <?php foreach($_SESSION["seats"] as $pointer => $value){ ?>
                        <span class="chk_section_list_item"><?php print $pointer; ?>：
                        <?php
                            if($value == "1"){ print "一般 1,100円"; }
                            if($value == "2"){ print "高校生 500円"; }
                            if($value == "3"){ print "大・専 500円"; }
                            if($value == "4"){ print "中・小 500円"; }
                            if($value == "5"){ print "幼児（3才～） 500円"; }
                            if($value == "6"){ print "シニア（60才以上）1,100円"; }
                            if($value == "7"){ print "障碍者割引 1,000円"; }
                        ?>
                        </span>
                        <?php } ?>
                    </p>
                </section>
                <section class="chk_section">
                    <h3 class="chk_section_ttl">お支払い情報</h3>
                    <p class="chk_section_list">
                        <span class="chk_section_list_item">決済方法：
                        <?php
                            if($_SESSION["pay"] == "1"){ print "クレジットカード決済"; }
                            if($_SESSION["pay"] == "2"){ print "クレジットカード決済"; }
                            if($_SESSION["pay"] == "3"){ print "コンビニ払い"; }
                        ?></span>
                    </p>
                </section>
                <form action="ex.php" method="post">
                    <div class="chk_btn">
                        <input class="chk_btn_red" type="submit" name="buy_confirm" value="購入確定">
                    </div>
                    <div class="chk_btn">
                    <?php if($MemMail != ""){ ?>
                        <input class="chk_btn_gray transition_pay_info" type="submit" name="back" value="戻る">
                    <?php }else if($MemMail == ""){ ?>
                        <input class="chk_btn_gray transition_user_info" type="submit" name="back" value="戻る">
                    <?php } ?>
                    </div>
                    <div class="chk_btn">
                        <input class="chk_btn_gray transition_cinema_schedule" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
                    </div>
                </form>
            </div>
            <div id="right">
            </div>
        </div>
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
