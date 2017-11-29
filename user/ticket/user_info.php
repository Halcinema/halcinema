<?php include("../login_session.php");
$pageTitle = "ご購入者情報の入力 | 予約";
?>

<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="user_info">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>ご購入に必要な情報を入力してください。</h2>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <form action="#">
                        <h3>漢字（姓）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>漢字（名）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>フリガナ（姓）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>フリガナ（名）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                    </form>
                </div>
                <div id="tel">
                    <h2>お電話番号（※必須項目）</h2>
                    <form action="#">
                        <h3>半角数字</h3>
                        <input class="txt_box" type="text" name="#" value="">
                    </form>
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <form action="#">
                        <h3>PC・スマートフォン</h3>
                        <input class="txt_box" type="email" name="#" value="">
                        <h3>確認の為、再入力してください。</h3>
                        <input class="txt_box" type="email" name="#" value="">
                    </form>
                </div>
                <div id="pay">
                    <h2>お支払い方法（※必須項目）</h2>
                    <form action="#">
                        <div class="clearfix">
                            <div class="select_pay"><input type="radio" name="" value="">クレジットカード</div>
                            <div class="select_pay"><input type="radio" name="" value="">楽天ペイ</div>
                            <div class="select_pay"><input type="radio" name="" value="">ドコモ ケータイ払い</div>
                            <div class="select_pay"><input type="radio" name="" value="">auかんたん決済</div>
                            <div class="select_pay"><input type="radio" name="" value="">ソフトバンクまとめて支払い</div>
                            <div class="select_pay"><input type="radio" name="" value="">ギフトカード</div>
                        </div>
                    </form>
                </div>
                <div id="next_area">
                    <form action="pay_info.php" method="post">
                        <input type="hidden" name="selected" value="<?php print $selected; ?>">
                        <input id="next" type="submit" name="next" value="次へ">
                    </form>
                </div>
                <div id="back_area">
                    <form action="select_ticket.php">
                        <input id="back" type="submit" name="back" value="戻る">
                    </form>
                </div>
                <div id="all_back_area">
                    <form action="sinema_schedule.php">
                        <input id="all_back" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="ticket_status">
                    <h2>ご購入内容</h2>
                    <dl>
                        <dt>作品</dt>
                        <dd><?php print $_SESSION["ticket_status"]["movie_name"]; ?></dd>
                        <dt>入場可能日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_enter"]; ?></dd>
                        <dt>上映開始日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_start"]; ?></dd>
                        <dt>上映終了日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_finish"]; ?></dd>
                        <dt>劇場</dt>
                        <dd><?php print $_SESSION["ticket_status"]["the_name"]; ?></dd>
                        <dt>座席・券種</dt>
                        <dd><?php foreach($_SESSION["seats"] as $pointer => $value){ ?>
                            <?php print $pointer; ?>
                            <?php
                                if($value == "1"){ print "一般 1,100円"; }
                                if($value == "2"){ print "高校生 500円"; }
                                if($value == "3"){ print "大・専 500円"; }
                                if($value == "4"){ print "中・小 500円"; }
                                if($value == "5"){ print "幼児（3才～） 500円"; }
                                if($value == "6"){ print "シニア（60才以上）1,100円"; }
                                if($value == "7"){ print "障碍者割引 1,000円"; }
                            ?>
                            <br>
                        <?php } ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
