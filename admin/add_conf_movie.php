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
$movie = $_POST;
$file_name = $_SESSION["admin"]["adminNum"].'_'.date("YmdHis");
$upFileName = $_FILES["movie_img"]["name"];
$fileEx = substr($upFileName, strrpos($upFileName, "."));

$updir = "./tmp/";
move_uploaded_file($_FILES["movie_img"]["tmp_name"], $updir.$file_name.$fileEx);

$_SESSION["createMenu"]["tmpDir"] = $updir;
$_SESSION["createMenu"]["fileNextName"] = $file_name;
$_SESSION["createMenu"]["fileEx"] = $fileEx;
?>
<!DOCTYPE html>
<?php include("../head.php"); ?>
<body>
    <div id="wrapper">
      <?php include("common.php"); ?>
        <div id="main">
          <h3 class="admin-heading-1">追加映画確認</h3>
              <h4 class="admin-heading-2">映画タイトル</h4>
              <span><?= $movie['movie_title'] ?></span></br>
              <h4 class="admin-heading-2">映画のストーリ</h4>
              <span><?= $movie['movie_story'] ?></span></br>
              <h4 class="admin-heading-2">映画監督</h4>
              <span><?= $movie['movie_sc'] ?></span></br>
              <h4 class="admin-heading-2">上映時間</h4>
              <span><?= $movie['runningtime'] ?>分</span></br>
              <h4 class="admin-heading-2">公開開始日</h4>
              <span><?= $movie['starttime'] ?></span></br>
              <h4 class="admin-heading-2">公開終了日</h4>
              <?= $movie['endtime'] ?></span><br>
              <h4 class="admin-heading-2">キャスト</h4>
              <span><?= $movie['movie_cast'] ?></span><br>
              <h4 class="admin-heading-2">イメージ</h4>
              <span><img src="<?php print $updir.$file_name.$fileEx;?>" alt=""></span><br>
          <form class="" action="ins_movie.php" method="post">
              <input type="hidden" name="movie_title" value="<?=  $movie['movie_title'] ?>">
              <input type="hidden" name="movie_story" value="<?= $movie['movie_story'] ?>">
              <input type="hidden" name="movie_sc" value="<?= $movie['movie_sc']  ?>">
              <input type="hidden" name="runningtime" value="<?=$movie['runningtime']  ?>">
              <input type="hidden" name="endtime" value="<?= $movie['starttime']  ?>">
              <input type="hidden" name="starttime" value="<?= $movie['endtime']   ?>">
              <input type="hidden" name="movie_cast" value="<?= $movie['movie_cast'] ?>">
              <input type="hidden" name="movie_img" value="<?= $_FILES['movie_img']['name'] ?>">
              <p class="center"><input type="submit" name="" value="登録"></p>
          </form>
        </div>
    </div>
</body>
</html>
