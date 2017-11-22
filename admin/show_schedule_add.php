<?php
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");

//時間を引き算する関数
function diffTime($start,$end) {

  $startSec = strtotime($start);
  $endSec   = strtotime($end);

  $diff = $endSec - $startSec;

  return gmdate('h:i',$diff);

}

//処理部
$PageTitle = "上映管理";

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
$SQL = "select t_show.*, t_movie.* from t_show, t_movie where scr_id = ".$SelectScreen."  AND DATE_FORMAT(show_start, '%Y-%m-%d') = '".$SelectDate."' AND t_show.movie_num = t_movie.movie_num order by show_start";
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
//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

echo print_r($RowAry2);
echo $RowAry2['movie_st'];
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<link rel="stylesheet" href="/halcinema/admin/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/halcinema/admin/css/common.css" type="text/css" />
<title>映画のスケジュールを追加 | halcinema管理</title>
</head>
<body>
    <div id="wrapper">
      <?php include("left.php"); ?>
        <div id="main">
          <form class="" action="show_schedule_add.php" method="post" enctype="multipart/form-data">
            <h4>劇場</h4>
            <select class="theater" name="select_theater">
              <option value="1">名古屋</option>
              <option value="2">大阪</option>
              <option value="3">東京</option>
            </select>
            <h4>スクリーン</h4>
            <select name="select_screen"t>
              <option value="101">Screen1</option>
              <option value="102">Screen2</option>
              <option value="103">Screen3</option>
              <option value="104">Screen4</option>
              <option value="105">Screen5</option>
              <option value="106">Screen6</option>
              <option value="107">Screen7</option>
              <option value="108">Screen8</option>
              <option value="109">Screen9</option>
              <option value="110">Screen10</option>
            </select>
              <h4>日時</h4>
              <input type="date" name="select_date" value="<?php echo $SelectDate; ?>">
              <p class="center"><input type="submit" name="btn" value="スケージュール確認" ></p>
          </form>

        <?php
            if($NumRows != "0"){
                for($i=0; $i<$NumRows; $i++) {
                    echo $RowAry[$i]['movie_name'];
                    echo $RowAry[$i]['show_enter'];
                    echo $RowAry[$i]['show_start'];
                    echo $RowAry[$i]['show_finish'];
                }
            }else{
                echo "該当上映データは存在しません。";
            }
        ?>
        <h3>映画のスケジュールを追加</h3>
        <div class="">
          <form class="" action="show_schedule_conf.php" method="post">
            <h4>劇場</h4>
            <select class="theater" name="select_theater">
              <option value="1">名古屋</option>
              <option value="2">大阪</option>
              <option value="3">東京</option>
            </select>
            <h4>スクリーン</h4>
            <select name="select_screen"t>
              <option value="101">Screen1</option>
              <option value="102">Screen2</option>
              <option value="103">Screen3</option>
              <option value="104">Screen4</option>
              <option value="105">Screen5</option>
              <option value="106">Screen6</option>
              <option value="107">Screen7</option>
              <option value="108">Screen8</option>
              <option value="109">Screen9</option>
              <option value="110">Screen10</option>
            </select>
            <h4>映画</h4>
            <select name="select_movie">
              <?php for($i=0; $i<$NumRows2; $i++) :?>
                <option value="<?= $RowAry2[$i]['movie_num']?>,<?php diffTime($RowAry[$i]['show_start'],$RowAry2[$i]['movie_st'])?>"><?= $RowAry2[$i]['movie_name'] ?></option>
              <?php endfor ?>
            </select>
              <h4>日時</h4>
              <input type="date" name="select_date" value="<?php echo $SelectDate; ?>"><br>
              <input type="time" name="showtime-start"><br>
              <input type="time" name="showtime-end"><br>
              <input type="hidden" name="movie_time" value="<?php  ?>">
              <p class="center"><input type="submit" name="btn" value="スケジュールに追加する" ></p>
          </form>
        </div>
        </div>
    </div>
</body>
</html>
