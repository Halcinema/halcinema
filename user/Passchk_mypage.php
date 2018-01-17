<?php Include("mypage_session.php") ?>
<?php
 $pass = $_GET["pass"];
 $flg = $_GET["flg"];
 
 if(isset($_GET["show_id"])){
 	$show_id  = $_GET["show_id"];
 }
 
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
  $SQL = "select * from t_member where mem_mail = '". $MemMail ."'";
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

/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["mem_mail"]
$RowAry[0]["mem_pass"]
$RowAry[0]["mem_fk"]
$RowAry[0]["mem_gk"]
$RowAry[0]["mem_ff"]
$RowAry[0]["mem_gf"]
$RowAry[0]["mem_sex"]
$RowAry[0]["mem_birth"]
$RowAry[0]["mem_post"]
$RowAry[0]["mem_pref"]
$RowAry[0]["mem_city"]
$RowAry[0]["mem_add"]
$RowAry[0]["mem_tel"]
$RowAry[0]["mem_reg"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
  mysqli_free_result($SqlRes);

  //  MySQLとの切断
  if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
 
 
  if(isset($pass)){
        if($RowAry[0]["mem_pass"] == $pass){
        
          if($flg == 1){
           $url = "Location: /halcinema/user/KAIINNhenkou_mypage.php";
           header($url);
           exit();
          }

          if($flg == 2){
           $url = "Location: /halcinema/user/KAIINNtaikai_mypage.php";
           header($url);
           exit();
          }

          if($flg == 3){
           $url = "Location: /halcinema/user/YYKdel_mypage.php?show_id=".$show_id;
           header($url);
           exit();
          }
          
        }
     }
     
     $msg = "パスワードが未入力、もしくは間違えています。";
     $url = "Location: /halcinema/user/checkpass".$flg."_mypage.php?msg=".$msg."";
     
     if($flg == 3){
     	$url = "Location: /halcinema/user/checkpass".$flg."_mypage.php?msg=".$msg."&show_id=".$show_id;
     }
     
     header($url);
     exit();
     
?>