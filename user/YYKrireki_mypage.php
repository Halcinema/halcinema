<?php Include("mypage_session.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_YYKrireki.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報</title>
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
 <h3>あなたの予約情報(予約履歴)</h3>
 
 <div id="YYKswitch">
  
	 <span><a href="YYKtyuu_mypage.php">予約中の上映映画</a></span>
   <span style="background-color:#7BF6FF;"><a href="YYKrireki_mypage.php">予約履歴</a></span>
   
 </div>
 
 <div id="page">
   <span><a href="#">前のページ</a></span>
   <span>1/1</span>
   <span><a href="#">次のページ</a></span>
 </div>
  
  <div id="kensuu">
  <p>全ての予約上映映画件数：00件</p>
  </div>
  
  <div id="eiga">
  <h4>映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>上映場所：HAL大阪</p>
  <p>上映時間：0000年00月00日00時00分～</p>
  <p>上映スクリーン：スクリーン1</p>
	  <div id="syousai_miru"><p><a href="YYKsyousai_mypage.php">詳細を見る</a></p></div>
  </div>
  
  <div id="eiga">
  <h4>映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>上映場所：HAL大阪</p>
  <p>上映時間：0000年00月00日00時00分～</p>
  <p>上映スクリーン：スクリーン1</p>
	  <div id="syousai_miru"><p><a href="YYKsyousai_mypage.php">詳細を見る</a></p></div>
  </div>
  
  <div id="eiga">
  <h4>映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>上映場所：HAL大阪</p>
  <p>上映時間：0000年00月00日00時00分～</p>
  <p>上映スクリーン：スクリーン1</p>
  <div id="syousai_miru"><p><a href="YYKsyousai_mypage.php">詳細を見る</a></p></div>
  </div>
  
  
 <div id="page">
   <span><a href="#">前のページ</a></span>
   <span>1/1</span>
   <span><a href="#">次のページ</a></span>
 </div>
  
  
  <div id="top"><a href="#wrapper">TOPへ</a></div>
  
 </div>

</div>
 

</body>
</html>
