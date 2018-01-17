<?php
include($_SERVER["DOCUMENT_ROOT"]."/halcinema/user/login_session.php");
$pageTitle = "人気投票";
if($MemMail == ""){
    header("Location: /halcinema/user/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<div id="wrapper">
<?php include($_SERVER["DOCUMENT_ROOT"]."/halcinema/head.php"); ?>
<body class="vote">
    <div id="wrapper">
      <div id="contents">
        <?php include($_SERVER["DOCUMENT_ROOT"]."/halcinema/user/header.php"); ?>
        <div id="title">
          <p class="vote_text_title">映画投票受け付け中</p>
        </div>
        <div id="contents">
          <p class="vote_text_caution">投票ランキングは一週間ごとに更新されます</p>
          <p class="vote_text_caution">※投票は週に一回可能です</p>
          <p class="vote_text_caution">グラフ表示</p>
        </div>

        <img src="images/vote01.jpg">


      </div>



    </div><!-- /#wrapper -->
</body>
</html>
