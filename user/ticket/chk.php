<?php include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "購入内容の確認 | 予約";
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
                <div id="credit">
                    <h2>クレジットカード</h2>
                        <p>
                            <h3>カード会社</h3>
                            VISA
                        </p>
                        <p>
                            <h3>カード番号</h3>
                            XXXX-XXXX-XXXX-1234
                        </p>
                        <p>
                            <h3>有効期限</h3>
                            XXXX年XX月XX日
                        </p>
                        <p>
                            <h3>名義人</h3>
                            〇〇〇〇
                        </p>
                        <p>
                            <h3>お支払回数</h3>
                            X回
                        </p>
                </div>
                <div id="next_area">
                    <form action="ex.php">
                        <input id="next" type="submit" name="next" value="購入確定">
                    </form>
                </div>
                <div id="back_area">
                    <form action="pay_info.php">
                        <input id="back" type="submit" name="back" value="戻る">
                    </form>
                </div>
                <div id="all_back_area">
                    <form action="sinema_schedule.php">
                        <input id="all_back" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
                    </form>
                </div>
            </div>
            <div id="right">
                <div id="purchase_contents">
                    <h2>ご購入内容</h2>
                    <dl>
                        <dt>作品</dt>
                        <dd>〇〇〇〇</dd>
                        <dt>日時</dt>
                        <dd>XXXX年XX月XX日(X)<br>XX:XX~XX:XX</dd>
                        <dt>座席・券種</dt>
                        <dd>スクリーン名<br>XX 〇〇／XXXX円<br>XX 〇〇／XXXX円<br>XX 〇〇／XXXX円</dd>
                        <?php foreach($_SESSION["seats"] as $pointer => $value){ ?>
                        <div class="ticket">
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
                        </div>
                        <?php } ?>
                        <dt>劇場</dt>
                        <dd>〇〇〇〇</dd>
                        <dt>合計</dt>
                        <dd>XXXX円</dd>
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
