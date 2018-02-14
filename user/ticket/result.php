<?php
include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/login_session.php');
header('Content-Type:text/html; charset=UTF-8');
$pageTitle = '購入完了 | 予約';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="ex">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>ご購入が完了しました。</h2>
                <a href="../index.php">トップへ戻る</a>
            </div>
            <div class="right">
            </div>
        </div>
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
