<?php Include("mypage_session.php") ?>
<?php

 $mail = $_GET["mail"];
 $pass = $_GET["pass"];
 $myouji = $_GET["myouji"];
 $myouji_huri = $_GET["myouji_huri"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];
 $mail = $_GET["mail"];

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
$SQL = "delete from t_member where mem_mail = '". $MemMail ."'";
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

session_unset();

header("Location: /halcinema/user/KAIINNtaikaiOK_mypage.php");
exit;



//  HTTPヘッダーで文字コードを指定
//header("Content-Type:text/html; charset=UTF-8");
?>