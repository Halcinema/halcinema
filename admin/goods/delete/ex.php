<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ削除／完了";

//DBレコード削除処理記述

?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズ削除完了メッセージを表示-->
            <!--/halcinema/admin/goods/への遷移リンクを設置-->
        </div>
    </div>
</body>
</html>
