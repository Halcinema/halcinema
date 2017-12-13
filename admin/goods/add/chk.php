<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ登録／確認";
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズ追加内容を表示-->
            <!--
                確定→/halcinema/admin/goods/add/ex.phpに遷移
                戻る→/halcinema/admin/goods/add/index.phpに遷移
                キャンセル→/halcinema/admin/goods/に遷移
            -->
        </div>
    </div>
</body>
</html>
