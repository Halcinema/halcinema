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
/*
//時間を引き算する関数
function diffTime($start,$end) {

  $startSec = strtotime($start);
  $endSec   = strtotime($end);

  $diff = $endSec - $startSec;

  return gmdate('h:i',$diff);

}
*/

$show_id = $_GET['showid'];
$movie_num = $_GET['movienum'];
//処理部
$pageTitle = "上映管理";

//検索条件受け取り用変数宣言
$SelectScreen = "";
$SelectDate = "";

if(isset($_POST['btn'])){
    $show = $_POST;
    $SelectScreen = $show['select_screen'];
    $SelectDate = $show['select_date'];
}else{
    $SelectScreen = "101";
    $SelectDate = date("Y-m-d");
}
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
$SQL = "select * from t_show where".$show_id;
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

$SQL2 = "select * from t_movie";

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

$SQL3 = "select * from t_screen where the_num = '".$AdminTheNum."'";

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
$showdate = date('Y-m-d', strtotime($RowAry[0]['show_start']));
$showtime = date('H:i',strtotime($RowAry[0]['show_start']));
?>

<!DOCTYPE html>
<?php include("../head.php") ?>
<body>
    <div id="wrapper">
      <?php include("common.php"); ?>
        <div id="main">
        <h3 class="admin-heading-1">スケジュール変更</h3>
        <h4> スケジュールID:<?= $RowAry[0]['show_id'] ?></h4>
        <h4><?= $RowAry[0]['show_start'] ?>から上映</h4>
        <div class="">
          <form class="" action="show_update_update.php" method="post">
            <h4 class="admin-heading-2">劇場</h4>
            <select class="theater" name="select_theater">
              <option value="1">名古屋</option>
              <option value="2">大阪</option>
              <option value="3">東京</option>
            </select>
            <h4 class="admin-heading-2">スクリーン</h4>
            <select name="select_screen">
              <?php for($i =0; $i<$NumRows3; $i++): ?>
                <option value="<?= $RowAry3[$i]['scr_id'] ?>" <?php if($RowAry3[$i]['scr_id'] == $RowAry[0]['scr_id']){ echo 'selected';} ?>>
                  <?= $RowAry3[$i]['scr_name'] ?>
                  </option>
              <?php endfor; ?>
            </select>
            <h4 class="admin-heading-2">映画</h4>
            <select name="select_movie">
              <?php for($i=0; $i<$NumRows2; $i++) :?>
                <option value="<?= $RowAry2[$i]['movie_num']?>" <?php if($RowAry[0]['movie_num'] == $RowAry2[$i]['movie_num']){ echo 'selected';} ?>><?= $RowAry2[$i]['movie_name'] ?></option>
              <?php endfor ?>
            </select>
              <h4 class="admin-heading-2">上映日</h4>
              <input type="date" name="select_date" value="<?= $showdate; ?>"><br>
              <h4 class="admin-heading-2">上映時間</h4>
              <input type="time" name="showtime-start" value="<?= $showtime; ?>"><br>
              <input type="hidden" name="get_showid" value="<?= $show_id ?>" >
              <input type="hidden" name="movie_num" value="<?= $movie_num ?>" >
              <p class="center"><input type="submit" name="btn" value="スケジュールに追加する" ></p>
          </form>
        </div>
        </div>
    </div>
</body>
<!--
,<?php //diffTime($RowAry2[$i]['show_start'],$RowAry2[$i]['movie_st'])?>
-->
</html>
