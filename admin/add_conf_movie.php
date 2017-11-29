<?php
include('login_session.php');
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
//処理部
$pageTitle = "ページ名";
//$_SESSION = $_FILES['movie_img'];
//echo $_SESSION ['movie_img'];
$movie = $_POST;

?>
<!DOCTYPE html>
<?php include("../head.php"); ?>
<body>
    <div id="wrapper">
      <?php include("common.php"); ?>
        <div id="main">
          <h3>確認してね☆</h3>
              <h4>映画タイトル</h4>
              <span><?= $movie['movie_title'] ?></span></br>
              <h4>映画のストーリ</h4>
              <span><?= $movie['movie_story'] ?></span></br>
              <h4>映画監督</h4>
              <span><?= $movie['movie_sc'] ?></span></br>
              <h4>上映時間</h4>
              <span><?= $movie['runningtime'] ?>分</span></br>
              <h4>公開開始日</h4>
              <span><?= $movie['starttime'] ?></span></br>
              <h4>公開終了日</h4>
              <?= $movie['endtime'] ?></span><br>
              <h4>キャスト</h4>
              <span><?= $movie['movie_cast'] ?></span><br>
              <h4>イメージ</h4>
              <span><?php echo $_FILES['movie_img']['name']; ?></span><br>
          <form class="" action="ins_movie.php" method="post">
              <input type="hidden" name="movie_title" value="<?=  $movie['movie_title'] ?>">
              <input type="hidden" name="movie_story" value="<?= $movie['movie_story'] ?>">
              <input type="hidden" name="movie_sc" value="<?= $movie['movie_sc']  ?>">
              <input type="hidden" name="runningtime" value="<?=$movie['runningtime']  ?>">
              <input type="hidden" name="endtime" value="<?= $movie['starttime']  ?>">
              <input type="hidden" name="starttime" value="<?= $movie['endtime']   ?>">
              <input type="hidden" name="movie_cast" value="<?= $movie['movie_cast'] ?>">
              <input type="hidden" name="movie_img" value="<?= $_FILES['movie_img']['name'] ?>">
              <input type="submit" name="" value="登録">
          </form>
        </div>
    </div>
</body>
</html>
