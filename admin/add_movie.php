<?php
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ページ名 | 管理";
?>
<!DOCTYPE html>
<?php include("../head.php");
<body>
    <div id="wrapper">
      <?php include("left.php"); ?>
        <div id="main">
          <h3>追加する映画の情報を入力してね☆</h3>
          <form class="" action="add_conf_movie.php" method="post" enctype="multipart/form-data">
              <h4>映画タイトル</h4>
              <input type="text" name="movie_title" value=""><br>
              <!-- <h4>映画のストーリ</h4> -->
              <h4 id="text_area"><label for="hoge">映画のストーリ</label></h4>
              <textarea name="movie_story" rows="7" cols="80"></textarea><br>
              <h4>映画監督</h4>
              <input type="text" name="movie_sc" value=""><br>
              <h4>上映時間</h4>
              <input type="text" name="runningtime" value="">分<br>
              <h4>公開開始日</h4>
              <input type="date" name="starttime" value=""><br>
              <h4>公開終了日</h4>
              <input type="date" name="endtime" value=""><br>
              <h4>キャスト</h4>
              <input type="text" name="movie_cast" value=""><br>
              <h4>イメージ</h4>
              <input type="file" name="movie_img" size="20">
              <p class="center"><input type="submit" name="" value="送信" ></p>
          </form>
        </div>
    </div>
</body>
</html>
