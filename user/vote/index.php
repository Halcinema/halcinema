<?php
include($_SERVER["DOCUMENT_ROOT"]."halcinema/user/login_session.php");
$pageTitle = "人気投票";
if($MemMail == ""){
    header("Location: /halcinema/user/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<div id="wrapper">
<?php include($_SERVER["DOCUMENT_ROOT"]."halcinema/head.php"); ?>
<body class="vote">
    <div id="wrapper">
       <?php include($_SERVER["DOCUMENT_ROOT"]."halcinema/user/header.php"); ?>
       <p class="vote_test">テスト</p>
    </div><!-- /#wrapper -->
</body>
</html>
