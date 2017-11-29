<?php
$theNum = "";
$date = "";
$RowAry = array();

if(isset($_GET["the_num"])){
    $theNum = $_GET["the_num"];
}
//if(isset($_GET["date"])){
    $date = $_GET["date"];
//}

include("mysqlenv.php");

if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
    exit("MySQL接続エラー<br />".mysqli_connect_error());
}

$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />".$SQL);
}

if(!mysqli_select_db($Link,$DB)){
    exit("MySQLDB選択エラー<br />".$DB);
}

$SQL = "select * from t_theater, t_screen, t_show, t_movie";
$SQL .= " where t_theater.the_num = '".$theNum."' AND t_show.show_id like '%".$theNum."__' AND t_show.show_start like '".$date."%' AND t_show.movie_num = t_movie.movie_num AND t_show.scr_id = t_screen.scr_id";
if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />".mysqli_error($Link) . "<br />" .$SQL);
}

while($Row = mysqli_fetch_array($SqlRes)){
    //$RowAry[] = $Row;
    $RowAry[] = array(
        'the_name' => $Row["the_name"],
        'show_id' => $Row["show_id"],
        'scr_id' => $Row["scr_id"],
        'scr_name' => $Row["scr_name"],
        'show_start' => $Row["show_start"],
        'show_finish' => $Row["show_finish"],
        'movie_num' => $Row["movie_num"],
        'movie_name' => $Row["movie_name"]
    );
}

$NumRow = mysqli_num_rows($SqlRes);

mysqli_free_result($SqlRes);

if(!mysqli_close($Link)){
    exit("MySQL切断エラー");
}

header('Content-Type: application/json');
echo json_encode($RowAry, JSON_UNESCAPED_UNICODE);
exit();
?>
