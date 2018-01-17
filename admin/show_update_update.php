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
// header('location: index.php');
//処理部
$PageTitle = "ページ名";
$show = $_POST;

$a = "00:10";

//上映開始日時データフォーマット処理
$replaceDatetime = str_replace('-', '', $show['select_date']);
$replaceDatetime .= str_replace(':', '', $show['showtime-start']);
$formatDatetime = date('Y/m/d H:i:s', strtotime($replaceDatetime));


$showid = $show['select_date'].$show['showtime-start'].$show['select_screen'];

$showid = str_replace(('-'),'', $showid);
$showid = str_replace((':'),'', $showid);

$entertime = diffTime($a,$show['showtime-start']);
$entertime = $show['select_date'].$entertime;
$entertime = date('Y-m-d H:i:s', strtotime($entertime));

$starttime = $show['select_date'].$show['showtime-start'];
$starttime = date('Y-m-d H:i:s', strtotime($starttime));

echo $showid.'<br>';
echo $entertime.'<br>';
echo $starttime.'<br>';

//時間を引き算する関数
function diffTime($start,$end) {

  $startSec = strtotime($start);
  $endSec   = strtotime($end);

  $diff = $endSec - $startSec;

  return gmdate('H:i',$diff);

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


$endtime = date("Y/m/d H:i:s", strtotime($formatDatetime."+".$RowAry3[0]["movie_st"]."minute"));


//  クエリー送信(選択クエリー)
$SQL = "update t_show set show_id = '".$showid."',";
$SQL .= " movie_num = '".$show['select_movie']."' ,";
$SQL .= " scr_id =".$show['select_screen'].",";
$SQL .= " show_enter = '".$entertime."',";
$SQL .= " show_start = '".$starttime."',";
$SQL .= " show_finish = '".$endtime."'";
// $SQL .= " movie_cast = '".$movie['movie_cast']."' ,";
// $SQL .= " movie_start = '".$movie['movie_start']."' ,";
// $SQL .= " movie_finish = '".$movie['movie_finish']."' ";
$SQL .= " where show_id = ".$show['get_showid'];

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


exit();//←忘れずに！

?>

