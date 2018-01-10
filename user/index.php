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
			<h2 id="at">注目映画</h2>

			<!-- Slider main container -->
			<div class="swiper-container">
			    <!-- Additional required wrapper -->
			    <div class="swiper-wrapper">
			        <!-- Slides -->
			        <div class="swiper-slide"><img src="images/main_slider_01.jpg"  width="650"></div>
			        <div class="swiper-slide"><img src="images/main_slider_02.jpg"  width="650"></div>
			        <div class="swiper-slide"><img src="images/main_slider_03.jpg"  width="650"></div>
			    </div>
			    <!-- If we need pagination -->
			    <div class="swiper-pagination"></div>

			    <!-- If we need navigation buttons -->
			    <div class="swiper-button-prev"></div>
			    <div class="swiper-button-next"></div>
			</div>

						<h2 id="rank">投票ランキング</h2>
   	        <div id="ranking">
				<section>
					<a href="#"><img src="images/bijo_yaju.jpg">
						<p>美女と野獣</p>
					</a>
				</section>
				<section>
					<a href="#"><img src="images/cinema01.jpg">
						<p>名探偵コナン から紅の恋歌 DETECTIVE CONAN 2017</p>
					</a>
				</section>
				<section>
					<a href="#"><img src="images/hoshi.jpg">
						<p>美しい星</p>
					</a>
				</section>
	   	   </div>

	   	 <div id="content">

	   	     <h2 id="new">お知らせ</h2>
	   	     <div id="news">
							<section>
								<div class="news_img"><img src="images/news01.jpg"></div>
								<div class="news_content">
										<div class="news_title">2017年7月22（土）公開に先駆け「心が叫びたがってるんだ。」の全国試写会にご招待！！</div>
								</div>
								<div class="news_tag">新着映画公開</div>
							</section>
							<section>
								<div class="news_img"><img src="images/news02.jpg"></div>
								<div class="news_content">
										<div class="news_title">2017年7月22（土）公開に先駆け「心が叫びたがってるんだ。」の全国試写会にご招待！！</div>
								</div>
							<div class="news_tag">新着映画公開</div>
							</section>
							<section>
								<div class="news_img"><img src="images/news03.jpg"></div>
								<div class="news_content">
										<div class="news_title">2017年7月22（土）公開に先駆け「心が叫びたがってるんだ。」の全国試写会にご招待！！</div>
								</div>
							<div class="news_tag">新着映画公開</div>
							</section>
							<section>
								<div class="news_img"><img src="images/cinema01.jpg"></div>
								<div class="news_content">
										<div class="news_title">2017年7月22（土）公開に先駆け「心が叫びたがってるんだ。」の全国試写会にご招待！！</div>
								</div>
							<div class="news_tag">イベント</div>
							</section>

	   	     </div>
					 <h2>映画投票受け付け中</h2>
					 <div id="tk_gd_rk">
						<section>
								 <img src="imges/goods.png">
							 <p>映画の投票を受け付けています。</p>
								<p>詳しくは下記のリンクから。</p>
							 <a href="/halcinema/user/vote/">投票ページへ移動</a>
						</section>
					 </div>
	   	     <div id="form"><span>※会員登録、ログインはこちらから</span><a href="create_ac_input.php">新規会員登録</a><a href="login.php">ログイン</a></div>
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

