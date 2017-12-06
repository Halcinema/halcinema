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
              <h4 class="admin-heading-2">映画タイトル</h4>
              <input type="text" name="movie_title" value=""><br>
              <!-- <h4>映画のストーリ</h4> -->
              <h4 class="admin-heading-2" id="text_area"><label for="hoge">映画のストーリ</label></h4>
              <textarea name="movie_story" rows="7" cols="80"></textarea><br>
              <h4 class="admin-heading-2">映画監督</h4>
              <input type="text" name="movie_sc" value=""><br>
              <h4 class="admin-heading-2">上映時間</h4>
              <input type="text" name="runningtime" value="">分<br>
              <h4 class="admin-heading-2">公開開始日</h4>
              <input type="date" name="starttime" value=""><br>
              <h4 class="admin-heading-2">公開終了日</h4>
              <input type="date" name="endtime" value=""><br>
              <h4 class="admin-heading-2">キャスト</h4>
              <input type="text" name="movie_cast" value=""><br>
              <h4 class="admin-heading-2">イメージ</h4>
              <input type="file" name="movie_img" size="25"><br>
              <h4 class="admin-heading-2">画像名</h4>
              <input type="text" name="imgname" value=""><br />
              <p class="center"><input type="submit" name="" value="送信" ></p>
          </form>
        </div>
    </div>
</body>
</html>
