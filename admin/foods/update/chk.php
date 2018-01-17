<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ修正／確認";
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズ修正内容を表示-->
            <!--
                確定→/halcinema/admin/goods/update/ex.phpに遷移
                戻る→/halcinema/admin/goods/update/index.phpに遷移
                キャンセル→/halcinema/admin/goods/detail.phpに遷移
            -->
        </div>
    </div>
</body>
</html>
