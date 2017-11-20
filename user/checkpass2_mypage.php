<?php Include("mypage_session.php") ?>
<?php
  if(isset($_GET["msg"])){
  $msg = $_GET["msg"];
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_checkpass.css" />
<link rel="stylesheet" href="css/mypage/mypage_checkpass2.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_本人確認パスワード入力</title>
</head>

<body>

<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>

<h2><?php print htmlspecialchars($MemName); ?>さんの会員ページ</h2>

 
 <div id="contents">
 <h3>本人確認パスワード</h3>
 
 <div id="checkpass">
 
 <form action="Passchk_mypage.php" method="POST">
 <p>本人確認のため、この会員のパスワードを入力してください。</p>
 <p id="msg"><?php if(isset($msg)){ print $msg; } ?></p>
 <input type="password" id="pass" name="pass" value="" />
 <input type="hidden" name="flg" value="2" />
 <input type="submit" id="txtsubmit" value="確認" />
 </form>
 
 </div>
 
	 <div id="top"><a href="KAIINN_mypage.php">戻る</a></div>
  
 </div>

</div>

</body>

</html>
