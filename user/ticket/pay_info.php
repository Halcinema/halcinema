<?php
include("../login_session.php");
$pageTitle = "お支払い情報の入力 | 予約";
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="pay_info">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <form class="pay_info_form" method="post" action="chk.php">
                    <h2>お支払いに必要な情報を入力してください。</h2>
                    <section class="pay_info_form_section">
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">クレジットカード払い</h4>
                            <label for="credit1"><input id="credit1" type="radio" name="pay" value="1">VISA:1234（下四桁）</label><br>
                            ※お支払いは一括のみとなります。
                        </p>
                    </section>
                    <section class="pay_info_form_section">
                        <h3 class="pay_info_form_section_ttl">クレジットカードを追加する。</h3>
                        <p class="pay_info_form_section_item">
                            <label for="credit2"><input id="credit2" type="radio" name="pay" value="2">このカードを新たに登録し、今回のお支払いに利用する。</label>
                        </p>
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">カード会社</h4>
                            <select class="pay_info_form_section_item_input" name="Cbrand">
                                <option name="#">選択してください。</option>
                                <option name="1">JCB</option>
                                <option name="2">VISA</option>
                                <option name="3">Master Card</option>
                                <option name="4">American Express</option>
                            </select>
                        </p>
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">カード番号</h4>
                            <input class="pay_info_form_section_item_input" type="text" name="Cnum" value="">
                        </p>
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">有効期限</h4>
                            <input class="pay_info_form_section_item_input" type="date" name="Cdeadline" value="">
                        </p>
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">名義人</h4>
                            <input class="pay_info_form_section_item_input" type="text" name="Cname" value="">
                        </p>
                    </section>
                    <section class="pay_info_form_section">
                        <p class="pay_info_form_section_item">
                            <h4 class="pay_info_form_section_item_ttl">コンビニ払い</h4>
                            <label for="credit3"><input id="credit3" type="radio" name="pay" value="3">コンビニ払いを使用</label>
                        </p>
                    </section>
                    <p class="pay_info_form_btn">
                        <input class="pay_info_form_btn_red" type="submit" name="next" value="次へ">
                    </p>
                    <p class="pay_info_form_btn">
                        <input class="pay_info_form_btn_gray transition_select_ticket" type="submit" name="back" value="戻る">
                    </p>
                    <p class="pay_info_form_btn">
                        <input class="pay_info_form_btn_gray transition_cinema_schedule" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
                    </p>
                </form>
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
