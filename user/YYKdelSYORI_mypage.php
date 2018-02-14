<?php Include("mypage_session.php") ?>
<?php

$res_num = $_GET["res_num"];

//処理部
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

//予約しているデータの抽出
$SQL  = "select * from t_reservation where res_num =".$res_num;
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


//予約している席データを0にする
$SQL = "update t_scon set ".$RowAry[0]["res_seat"]." = 0 ";
$SQL .= "where res_num = '".$res_num."'";

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}


//予約データの削除
$SQL = "delete from t_reservation where res_num = '".$res_num."'";
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

header("Location: /halcinema/user/YYKdelOK_mypage.php");
exit;

?>