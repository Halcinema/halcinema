<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ詳細";
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズの詳細を表示-->
            <a href="/halcinema/admin/goods/update/">修正</a>
            <a href="/halcinema/admin/goods/delete/">削除</a>
        </div>
    </div>
</body>
</html>
