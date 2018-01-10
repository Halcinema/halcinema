<?php
include('login_session.php');
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ページ名 | 管理";
?>
<!DOCTYPE html>
<?php include("../head.php"); ?>
<body class="add_movie">
    <div id="wrapper">
      <?php include("common.php"); ?>
        <div id="main">
          <h3 class="admin-heading-1">追加映画情報を入力してください</h3>
          <form class="" action="add_conf_movie.php" method="post" enctype="multipart/form-data">
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画タイトル</h4>
                <input type="text" name="movie_title" value="" class="textform" placeholder="CinemaTitle"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画のストーリー</h4>
                <textarea class="textarea" name="movie_story" placeholder="CinemaStory"></textarea><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画監督</h4>
                <input type="text" name="movie_sc" value="" class="textform" placeholder="Director "><br>
              </div> 
              <div class="form-box">
                <h4 class="admin-heading-2 tes">上映時間</h4>
                <input type="text" name="runningtime" value="" class="textform" placeholder="分"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">公開開始日</h4>
                <input type="date" name="starttime" value="" class="dateform" placeholder="StartDay"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">公開終了日</h4>
                <input type="date" name="endtime" value="" class="dateform" placeholder="EndDay"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">キャスト</h4>
                <input type="text" name="movie_cast" value="" class="textform" placeholder="Cast"><br>
              </div>
              <input type="file" name="movie_img" size="25"><br>
              <p class="center"><input type="submit" name="" value="送信" ></p>                
          </form>
        </div>
    </div>
</body>
</html>
