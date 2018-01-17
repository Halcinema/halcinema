<?php include("login_session.php"); ?>
<!DOCTYPE html>

<html lang="ja">
<div id="wrapper">
	<head>
		<meta charset="utf-8">
		<title>HALシネマ</title>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/swiper.min.css" rel="stylesheet">
 		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css"> -->
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/common.css">
		<link href="jquery.bxslider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/index.css">
		<script src="js/jquery-1.11.2.min.js"></script>
		<!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->
	</head>
	<body>
	   <div id="wrapper">
			<?php include("header.php"); ?>


						<h2 id="rank">投票確認画面</h2>
   	        <div id="ranking">
				<section>
					  <p>投票映画の確認をしてください。</p>
						<a href="#"><img src="images/bijo_yaju.jpg">
						<p>美女と野獣</p>
					</a>
				</section>
	   	   　　</div>

						<div align="center"><div id="form"><a href="vote_completion.php">送信</a><a href="vote.php">戻る</a></div></div>
				 </div>
		</div>
	   <footer>
			 <div id="cr">©Hal Cinemas Ltd. All Rights Reserved. </div>
	   </footer>
<script src="js/swiper.min.js"></script>
  <script>
	var mySwiper = new Swiper ('.swiper-container', {
	  loop: true,
	  slidesPerView: 2,
	  spaceBetween: 0,
	  centeredSlides : true,
	  pagination: '.swiper-pagination',
	  nextButton: '.swiper-button-next',
	  prevButton: '.swiper-button-prev',
		autoplay:'3000',
	  breakpoints: {
	    767: {
	      slidesPerView: 1,
	      spaceBetween: 0
	    }
	  }
	})
	</script>
	</body>

</html>
