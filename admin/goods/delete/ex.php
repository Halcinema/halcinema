<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ削除／完了";

//DBレコード削除処理記述
//  処理部
//  データの受信（今回はエラー処理なし）
  $num = $_POST["num"];

print $num;
//  MySQL定数の組み込み
include("../../../user/mysqlenv.php");

//  MySQLへの接続
if(!$Link = mysqli_connect
       ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー" . mysqli_connect_error());
}

//  MySQLへの文字コード指定
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー" . $SQL);
}

//  MySQLデータベース指定
if(!mysqli_select_db($Link,$DB)){
  exit("MySQLDB選択エラー" . $DB);
}
/***************************************
  使用するMySQL：localhost
  使用するDB名：2017wp32db

  部署テーブル：t_busho
  部署ID：buid char(1) primary key
  部署名：buname varchar(10)
****************************************/


$SQL = "delete from t_goods";
$SQL .= " where goods_num='" . $num . "'";
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー<br />" . 
      mysqli_error($Link) . "<br />" .$SQL);
}

/*
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー<br />" . 
      mysqli_error($Link) . "<br />" .$SQL);
}
*/

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
            <!--ここにグッズ削除完了メッセージを表示-->
            <p>削除しました。</p>
            <!--/halcinema/admin/goods/への遷移リンクを設置-->
            <a href="../index.php">グッズ一覧に戻る</a>
        </div>
    </div>
</body>
</html>
