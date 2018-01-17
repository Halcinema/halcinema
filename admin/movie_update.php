<?php
//処理部
$pageTitle = "ページ名";
include("login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ダッシュボード";
?>
<?php
$movie_id = $_GET['id'];

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
$SQL = "select * from t_movie where movie_num =".$movie_id;
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

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
?>

<!DOCTYPE html>
<?php include("../head.php"); ?>
<body>
    <div id="wrapper">
     <?php include("common.php"); ?>
        <div id="main">
          <form class="" action="movie_update_update.php" method="post" enctype="multipart/form-data">
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画タイトル</h4>
                <input type="text" name="movie_name" value="<?=$RowAry[0]['movie_name']?>" class="textform" placeholder="CinemaTitle"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画のストーリー</h4>
                <textarea class="textarea" name="movie_story" value="" placeholder="CinemaStory"><?=$RowAry[0]['movie_story']?></textarea><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">映画監督</h4>
                <input type="text" name="movie_sc" value="<?=$RowAry[0]['movie_sc']?>" class="textform" placeholder="Director "><br>
              </div> 
              <div class="form-box">
                <h4 class="admin-heading-2 tes">上映時間</h4>
                <input type="text" name="movie_st" value="<?=$RowAry[0]['movie_st']?>" class="textform" placeholder="分"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">公開開始日</h4>
                <input type="date" name="movie_start" value="<?=$RowAry[0]['movie_start']?>" class="dateform" placeholder="StartDay"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">公開終了日</h4>
                <input type="date" name="movie_finish" value="<?=$RowAry[0]['movie_finish']?>" class="dateform" placeholder="EndDay"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">キャスト</h4>
                <input type="text" name="movie_cast" value="<?=$RowAry[0]['movie_cast']?>" class="textform" placeholder="Cast"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">公式ホームページ</h4>
                <input type="text" name="" value="<?=$RowAry[0]['movie_cast']?>" class="textform" placeholder="Cast"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">コピーライト</h4>
                <input type="text" name="movie_cast" value="<?=$RowAry[0]['movie_cast']?>" class="textform" placeholder="Cast"><br>
              </div>
              <div class="form-box">
                <h4 class="admin-heading-2 tes">レーティング</h4>
                <input type="text" name="movie_cast" value="<?=$RowAry[0]['movie_cast']?>" class="textform" placeholder="Cast"><br>
              </div>
              <input type="hidden" name="movie_num" value="<?= $movie_id ?>">
              <input type="file" name="movie_img" size="25"><br>
              <p class="center"><input type="submit" name="" value="送信" ></p>                
          </form>
        </div>
    </div>
</body>
</html>
