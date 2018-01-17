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


						<h2 id="rank">投票ランキング</h2>
   	        <div id="ranking">
				<section>
						<p>一位</p>
						<a href="#"><img src="images/bijo_yaju.jpg">
						<p>美女と野獣</p>
					</a>
				</section>
				<section>
					<p>二位</p>
						<a href="#"><img src="images/cinema01.jpg">
						<p>名探偵コナン から紅の恋歌 DETECTIVE CONAN 2017</p>
					</a>
				</section>
				<section>
					<p>三位</p>
						<a href="#"><img src="images/hoshi.jpg">
						<p>美しい星</p>
					</a>
				</section>
	   	   </div>

	   	 <div id="content">

	   	     <h2 id="new">投票</h2>
	   	     <div id="news">
						 <section>
							 <div class="news_img"><img src="images/001.jpg"></div>
							 <div class="news_content">
									 <div class="news_title">映画タイトル</div>
							 </div>
						 <div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
						 </section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
	   	     </div>
	   	     <div id="news">
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
								<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
							<section>
								<div class="news_img"><img src="images/001.jpg"></div>
								<div class="news_content">
										<div class="news_title">映画タイトル</div>
								</div>
							<div class="news_tag"><a href="vote_confirmation.php">投票する</a></div>
							</section>
	   	     </div>
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
