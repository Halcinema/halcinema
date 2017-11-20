<?php Include("mypage_session.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_MLMG.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_メールマガジン_メール詳細</title>
</head>

<body>

<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>


<h2><?php print htmlspecialchars($MemName); ?>さんの会員ページ</h2>
<div id="mypage_nav">
  <ul>
   <li><a href="YYKtyuu_mypage.php">あなたの予約情報</a></li>
   <li><a href="Coupon_mypage.php">クーポン一覧</a></li>
   <li><a href="MLMG_mypage.php">メールマガジン</a></li>
   <li><a href="Review_mypage.php">レビュー履歴</a></li>
   <li><a href="KAIINN_mypage.php">会員情報</a></li>
  </ul>
 </div>
 
 <div id="contents">
 <h3>メール詳細</h3>
 
 <div id="MLMG">
 <h4>メールの件名</h4>
  <p>メール内容</p>
 </div>
 
  <div id="top"><a href="MLMG_mypage.php">戻る</a></div>
  <div id="top"><a href="#wrapper">TOPへ</a></div>
   
 </div>

</div>

</body>
</html>
