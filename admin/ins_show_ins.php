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

//処理部
$PageTitle = "ページ名";
$show = $_POST;
//$showidStart = date('H:i:s',strtotime($show['showtime-start']);

//echo $showid;
$a = "00:10";
$showid = $show['select_date'].$show['showtime-start'].$show['select_screen'];

$showid = str_replace(('-'),'', $showid);
$showid = str_replace((':'),'', $showid);
echo $showid;
$entertime = diffTime($a,$show['showtime-start']);
$entertime = $show['select_date'].$entertime;
$entertime = date('Y-m-d H:i:s', strtotime($entertime));

$starttime = $show['select_date'].$show['showtime-start'];
$starttime = date('Y-m-d H:i:s', strtotime($starttime));

$endtime = "14:00";
$endtime = $show['select_date'].$endtime;
$endtime = date('Y-m-d H:i:s', strtotime($endtime));
//.$show['showtime-end']


//時間を引き算する関数
function diffTime($start,$end) {

  $startSec = strtotime($start);
  $endSec   = strtotime($end);

  $diff = $endSec - $startSec;

  return gmdate('h:i',$diff);

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
$SQL = "insert into t_show (show_id,movie_num,scr_id,show_enter,show_start,show_finish)";
// $SQL .= " ('" . $movie[movie_title]. "','" . $movie[movie_story]. "','" . $movie[movie_sc]. "','" . $movie[running]. "','" . $movie['aa']. "','" . $buid . "','" . $buid . "')";
// $SQL .= " vlues('" . $movie['movie_title']. "'," . $movie['movie_title']. "')";

$SQL .= " values('".$showid."', ' ".$show['select_movie']." ',' ".$show['select_screen']." ',' ".$entertime." ',' ".$starttime." ',' ".$endtime." ')";
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}
//mysql_insert_id
//move_uploaded_file($_FILES['movie_img']['tmp_name'],"./images/".$_FILES['movie_img']['name']);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
//echo $_FILES['movie_img']['name'];
?>
