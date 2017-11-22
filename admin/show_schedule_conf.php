<?php
session_start();
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
$PageTitle = "ページ名";
//$_SESSION = $_FILES['movie_img'];
//echo $_SESSION ['movie_img'];
$show = $_POST;

$show

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<link rel="stylesheet" href="/halcinema/admin/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/halcinema/admin/css/common.css" type="text/css" />
<link rel="stylesheet" href="/halcinema/admin/css/add_movie.css" type="text/css" />
<!--  StyleSheet記述
<link rel="stylesheet" href="./css/main.css" type="text/css" media="all">
StyleSheet記述  -->
<title>ページ名 | halcinema管理</title>
</head>
<body>
    <div id="wrapper">
      <?php include("left.php"); ?>
        <div id="main">
          <h3>確認してね☆</h3>
              <h4>劇場</h4>
              <span><?= $show['select_theater'] ?></span></br>
              <h4>スクリーン</h4>
              <span><?= $show['select_screen'] ?></span></br>
              <h4>上映映画</h4>
              <span><?= $show['select_movie'] ?></span></br>
              <h4>上映日</h4>
              <span><?= $show['select_date'] ?></span></br>
              <h4>上映開始時間</h4>
              <span><?= $show['showtime-start'] ?></span></br>
              <h4>上映終了時間</h4>
              <span><?= $showtime_end ?></span></br>
          <form class="" action="ins_show_ins.php" method="post">
              <input type="hidden" name="select_theater" value="<?=  $show['select_theater'] ?>">
              <input type="hidden" name="select_screen" value="<?= $show['movie_story'] ?>">
              <input type="hidden" name="select_screen" value="<?= $show['select_screen']  ?>">
              <input type="hidden" name="select_movie" value="<?= $show['select_movie']  ?>">
              <input type="hidden" name="select_date" value="<?= $show['select_date']  ?>">
              <input type="hidden" name="showtime-start" value="<?=$show['showtime-start'] ?>">
              <input type="hidden" name="showtime-end" value="<?= $show['showtime-end'] ?>">
              <input type="submit" name="" value="登録">
          </form>
        </div>
    </div>
</body>
</html>
