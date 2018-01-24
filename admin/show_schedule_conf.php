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
$show = $_POST;

//上映開始日時データフォーマット処理
$replaceDatetime = str_replace('-', '', $show['select_date']);
$replaceDatetime .= str_replace(':', '', $show['showtime-start']);
$formatDatetime = date('Y/m/d H:i:s', strtotime($replaceDatetime));

?>
<?php

//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("mysqlenv.php");

//  MySQLとの接続開始
if(!$Link = mysqli_connect
            ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー<br />" .
    mysqli_connect_error());
}

//  クエリー送信(文字コード)
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        $SQL);
}

//  MySQLデータベース選択
if(!mysqli_select_db($Link,$DB)){
  //  MySQLデータベース選択失敗
  exit("MySQLデータベース選択エラー<br />" .
        $DB);
}
//  クエリー送信(選択クエリー)
$SQL = "select * from t_theater where the_num =".$AdminTheNum;
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（全件配列に格納）
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry[] = $Row;
}

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

$SQL2 = "select * from t_screen where scr_id =".$show['select_screen'];

if(!$SqlRes = mysqli_query($Link,$SQL2)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL2);
}

while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry2[] = $Row;
}

$NumRows2 = mysqli_num_rows($SqlRes);

$SQL3 = "select * from t_movie";

if(!$SqlRes = mysqli_query($Link,$SQL3)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL3);
}

while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry3[] = $Row;
}

$NumRows3 = mysqli_num_rows($SqlRes);
//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

$addDatetime = date("Y/m/d H:i:s", strtotime($formatDatetime."+".$RowAry3[0]["movie_st"]."minute"));

?>

<!DOCTYPE html>
<?php include("../head.php") ?>
<body>
    <div id="wrapper">
      <?php include("common.php"); ?>
        <div id="main">
          <h3 class="admin-heading-1">入力情報確認</h3>
              <h4 class="admin-heading-2">スクリーン</h4>
              <span><?= $RowAry2[0]['scr_name']?></span></br>
              <h4 class="admin-heading-2">上映映画</h4>
              <span><?= $RowAry3[0]['movie_name'] ?></span></br>
              <h4 class="admin-heading-2">上映日</h4>
              <span><?= $show['select_date'] ?></span></br>
              <h4 class="admin-heading-2">上映開始時間</h4>
              <span><?= $show['showtime-start'] ?></span></br>
              <h4 class="admin-heading-2">上映終了時間</h4>
              <span><?= $addDatetime ?></span></br>
          <form class="" action="ins_show.php" method="post">
              <input type="hidden" name="select_screen" value="<?= $show['select_screen']  ?>">
              <input type="hidden" name="select_movie" value="<?= $show['select_movie']  ?>">
              <input type="hidden" name="select_date" value="<?= $show['select_date']  ?>">
              <input type="hidden" name="showtime-start" value="<?=$show['showtime-start'] ?>">
              <input type="hidden" name="showtime-end" value="<?= $addDatetime ?>">
              <p class="center"><input type="submit" name="" value="登録"></p>
          </form>
        </div>
    </div>
</body>
</html>
