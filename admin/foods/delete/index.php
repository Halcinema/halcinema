<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ削除／確認";
?>
<?php
$num = $_GET["num"];
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
                <!--ここにグッズ削除確認を表示-->
            <p>削除しますか？</p>
                <!--
                    確定→/halcinema/admin/goods/delete/ex.phpに遷移
                    キャンセル→/halcinema/admin/goods/index.phpに遷移
                -->
            <form action="ex.php" method="post">
                <input type="hidden" name="num" value="<?php print $num ?>">
                <input type="submit" value="削除">
            </form>
        </div>
    </div>
</body>
</html>
