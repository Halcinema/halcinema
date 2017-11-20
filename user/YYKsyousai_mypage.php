<?php Include("mypage_session.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link href="css/mypage/mypage_YYKsyousai.css" rel="stylesheet" type="text/css">
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報_予約情報の詳細</title>
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
 <h3>予約情報の詳細</h3>
 
 <div id="YYKsyousai">
 <h4>映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  
  <table border="0">
   <tr>
    <td id="hutoi">上映場所</td><td>HAL名古屋</td>
   </tr>
   <tr>
    <td id="hutoi">上映時間</td><td>0000年00月00日　00時00分～</td>
	  </tr>
   <tr>
    <td id="hutoi">上映スクリーン</td><td>スクリーン1</td>
   </tr>
   <tr>
    <td id="hutoi">チケット</td><td>大人1人　0000円<br />高校生1人　0000円<br />中学生1人　0000円<br />小学生1人　0000円<br /></td>
   </tr>
   <tr>
    <td id="hutoi">グッズ</td><td>ぬいぐるみ　0000円<br />パンフレット　0000円<br /></td>
   </tr>
   <tr>
    <td id="hutoi">ドリンク・フード</td><td>オレンジジュース　0000円<br />ポップコーンL　0000円<br /></td>
   </tr>
   <tr>
    <td id="hutoi">合計金額</td><td>0000円</td>
   </tr>
   <tr>
    <td id="hutoi">支払方法</td><td>クレジットカード</td>
   </tr>
  </table>
  
  <div id="YYkopsion">
  <h4>予約オプション</h4>
  <p><a href="#">変更する</a></p>
  <p><a href="checkpass3_mypage.php">取消する</a></p>
  </div>
  
 </div>
 
<div id="top"><p><a href="YYKtyuu_mypage.php">戻る</a></p></div>
<div id="top"><a href="#wrapper">TOPへ</a></div>

</div>

</body>
</html>
