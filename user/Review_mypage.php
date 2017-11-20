<?php Include("mypage_session.php") ?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/mypage/mypage_all.css" />
<link rel="stylesheet" href="css/mypage/mypage_review.css" />
<script src = "js/jquery-1.11.2.min.js" type = "text/javascript"></script>
<script src = "js/main.js" type = "text/javascript"></script>

<title>会員ページ_レビュー履歴</title>

<script language="JavaScript">
	<!--
	
	function btnClick(){

	if(window.confirm('選択したレビューを削除します。よろしいですか？')){ 

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理
	
		return false; // 送信を中止

	}

}

	
     -->
	</Script>


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
 <h3>レビュー履歴</h3>
 
 <div id="page">
   <span><a href="#">前のページ</a></span>
   <span>1/1</span>
   <span><a href="#">次のページ</a></span>
 </div>
  
  <div id="kensuu">
  <p>あなたがレビューした件数：00件</p>
  </div>
  
  
  <div id="Review">
  <form action="Review_mypage.php" method="GET" onsubmit="return btnClick()">
  <h4>レビューした映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>レビューした日：0000年00月00日 00:00</p>
  <p>レビュー内容</p>
  <input type="submit" id="btn1" value="このレビューを削除する" />
  </form>
  </div>

  <div id="Review">
  <form action="Review_mypage.php" method="GET" onsubmit="return btnClick()">
  <h4>レビューした映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>レビューした日：0000年00月00日 00:00</p>
  <p>レビュー内容</p>
  <input type="submit" id="btn1" value="このレビューを削除する" onClick="btnClick()" />
  </form>
  </div>
  
  <div id="Review">
  <form action="Review_mypage.php" method="GET" onsubmit="return btnClick()">
  <h4>レビューした映画名</h4>
  <p><img src="images/eiga1.jpg" alt="eiga1"></p>
  <p>レビューした日：0000年00月00日 00:00</p>
  <p>レビュー内容</p>
  <input type="submit" id="btn1" value="このレビューを削除する" onClick="btnClick()" />
  </form>
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
