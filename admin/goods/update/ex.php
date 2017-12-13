<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ修正／完了";

//DB更新処理記述

?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズ修正完了メッセージを表示-->
            <!--/halcinema/admin/goods/detail.phpへの遷移リンクを設置-->
        </div>
    </div>
</body>
</html>
