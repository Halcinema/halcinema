<?php Include("mypage_session.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_KAIINNtaikai.css" />
<link rel="stylesheet" href="css/mypage/mypage_KAIINNhenkou.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_あなたの予約情報_予約情報の変更</title>
</head>

<body>


<div id="wrapper">
<?php Include("../../halcinema/user/header.php") ?>

 
 <h2><?php print htmlspecialchars($MemName); ?>さんの会員ページ</h2>

 
 <div id="contents">
 <h3>会員の退会</h3>
 
 <div id="KAIINNtaikai">
 
 <h4>この会員を退会します。よろしいですか？</h4>
 <p>[ ご注意 ]　「退会する」をクリックすると、この会員は退会され、使用できなくなります。</p>
 
 <form action="KAIINNtaikaiSYORI_mypage.php">
  <input type="submit" id="submit" value="退会する" />
  </form>
  
 </div>
 
  <div id="top"><a href="KAIINN_mypage.php">戻る</a></div>
  
  
 </div>

</div>

</body>
</html>
