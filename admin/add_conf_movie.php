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

$rpos = strpos($_FILES["movie_img"]["name"],'.');//左から数えてn番目のピリオド
$ex_name = substr($_FILES["movie_img"]["name"],$rpos);//n番目以降の文字を抜き出す
$file_name = $_POST['imgname'].$ex_name;
$updir = "./images/";
$file_name;

$updir.=$file_name;
//  処理部
move_uploaded_file
($_FILES["movie_img"]["tmp_name"],
$updir);

//画像処理
//大きさを求める
$imginfo = getimagesize("{$updir}");
//取り込み
$img_input = imagecreatefromjpeg("{$updir}");
//出力
$img_output = imagecreatetruecolor(1000, 1000);
imagecopy($img_output,$img_input,0,0,0,0,300,300);

$img_input2 = imagecreatefromjpeg("{$updir}");
$input_width = imagesx($img_input2);
$input_height = imagesy($img_input2);
$output_width = $input_width *1.0;
$output_height = $input_height *1.0;
$img_sum1 = imagecreatetruecolor($output_width, $output_height);
imagecopyresized($img_sum1, $img_input,0,0,0,0,$output_width,$output_height,$input_width, $input_height);
imagejpeg($img_sum1,"{$updir}",100);


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
              <span><img src="images/<?php echo $file_name; ?>" alt=""></span><br>
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
