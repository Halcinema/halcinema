<?php
if(!isset($MemMail)){
    $MemMail = "";
}
?>


<!DOCTYPE html><head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://localhost:1024/halcinema/user/css/header.css" type="text/css">
</head>




<header>


	<div id="header_top" class="flex-container">
	<h1 id="logo"><!--<img src="images/logo.png" id="logo">-->HAL<br>cinema</h1>
　	<nav  class="flex-container">
		<ul>
			<li>
				<a href="http://localhost:1024/halcinema/user/index.php"><img src="images/home.png" width="30" class="gn_icon"><span></span>トップ</a>
			</li>
			<li>
				<a href="http://localhost:1024/halcinema/user/movie_now.php"><img src="images/movie_now.png" width="30" class="gn_icon">上映中</a>
			</li>
			<li>
				<a href="http://localhost:1024/halcinema/user/movie_schedule.php"><img src="images/movie_sc.png" width="25" class="gn_icon">公開予定</a>
			</li>
			<li>
				<a href="http://localhost:1024/halcinema/user/theater.php"><img src="images/theater.svg" width="30" class="gn_icon">劇場一覧</a>
			</li>
			<li>
				<a href="http://localhost:1024/halcinema/user/service.php"><img src="images/goods2.svg" width="30" class="gn_icon">サービス案内</a>
			</li>
		</ul>
	</nav>
	<div id="login" class="flex-container">
	<?php if($MemMail == ""): ?>
		<a href="http://localhost:1024/halcinema/user/account/login/index.php" id="lg">ログイン</a>
		<a href="http://localhost:1024/halcinema/user/account/create/index.php" id="mem">会員登録</a>
    <?php else: ?>
        <p><?php print $MemName ?>さん</p>
        <a href="http://localhost:1024/halcinema/user/YYKtyuu_mypage.php" id="lg">マイページ</a>
		<a href="http://localhost:1024/halcinema/user/account/logout/index.php" id="mem">ログアウト</a>
    <?php endif; ?>
	</div>
	</div>
</header>
