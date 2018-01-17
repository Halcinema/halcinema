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
$movie = $_POST;
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
$SQL = "update t_movie set movie_name = '".$movie['movie_name']."',";
$SQL .= " movie_story = '".$movie['movie_story']."' ,";
$SQL .= " movie_sc = '".$movie['movie_sc']."' ,";
$SQL .= " movie_st = '".$movie['movie_st']."' ,";
$SQL .= " movie_cast = '".$movie['movie_cast']."' ,";
$SQL .= " movie_start = '".$movie['movie_start']."' ,";
$SQL .= " movie_finish = '".$movie['movie_finish']."' ";
$SQL .= " where movie_num = ".$movie['movie_num'];

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

exit();//←忘れずに！
?>

