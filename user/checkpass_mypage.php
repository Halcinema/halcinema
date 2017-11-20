<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_checkpass.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_本人確認パスワード入力</title>
</head>

<body>

<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>

<h2>○○さんの会員ページ</h2>
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
 <h3>本人確認パスワード</h3>
 
 <div id="checkpass">
 
 <form action="KAIINNhenkou_mypage.php">
 <p>本人確認のため、この会員のパスワードを入力してください。</p>
 <input type="text" id="txtpass" value="" />
 <input type="submit" id="txtsubmit" value="送信" />
 </form>
 
 </div>
 
	 <div id="top"><a href="KAIINN_mypage.php">戻る</a></div>
  
 </div>

</div>

</body>
</html>
