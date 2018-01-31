<?php
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定
include('login_session.php');
header("Content-Type:text/html; charset=UTF-8");
// header('location: index.php');
//処理部
$PageTitle = "ページ名";
$movie = $_POST;

 // MySQL関連変数を外部ファイルで持たせる
 // 外部ファイルの読み込み

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
$SQL = " insert into t_movie ";
$SQL .= "(movie_name, movie_start, movie_finish, movie_story, movie_st, movie_sc, movie_cast, mgenre_num, movie_file)";
$SQL .= " values( ";
$SQL .= " '".$movie['movie_title']."', ";
$SQL .= " '".$movie['starttime']."', ";
$SQL .= " '".$movie['endtime']."', ";
$SQL .= " '".$movie['movie_story']."', ";
$SQL .= $movie['runningtime'].", ";
$SQL .= " '".$movie['movie_sc']."',";
$SQL .= " '".$movie['movie_cast']."', ";
$SQL .= " '1', ";
$SQL .= " '".$_SESSION["createMenu"]["fileNextName"].$_SESSION["createMenu"]["fileEx"]."' ";
$SQL .= " ) ";
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


//画像処理

//tmpディレクトリ
$tmpDir = $_SESSION["createMenu"]["tmpDir"];
//拡張子
$fileName = $_SESSION["createMenu"]["fileNextName"].$_SESSION["createMenu"]["fileEx"];
//移動先ディレクトリ
$imagesDir = "./images/";

if(!rename($tmpDir.$fileName, $imagesDir.$fileName)){
    print "ファイルの移動に失敗しました。";
}
header('Location:add_movie.php');
?>

