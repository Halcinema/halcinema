<?php session_start();
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

if(isset($_POST["ShowId"])){
    $ShowId = $_POST["ShowId"];
}

if(isset($_POST["selected"])){
    if(isset($_SESSION["seats"])){
        unset($_SESSION["seats"]);
    }
    $selected = $_POST["selected"];
    $_SESSION["seats"] = $selected;
}

//print_r($selected);

//echo "<br>";

foreach($_SESSION["seats"] as $shid => $num){
    //echo $shid;
    //echo ":";
    //echo $num;
    //echo "<br>";
}

if(isset($_POST["status"])){
    $status = $_POST["status"];
}

if($status == "0"){
    $MemMail = $_POST["txtMail"];
    $MemPass = $_POST["txtPass"];

    //  MySQL関連変数を外部ファイルで持たせる
    //  外部ファイルの読み込み
    include("../mysqlenv.php");

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
    $SQL = "select * from t_member where mem_mail='".$MemMail."'";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
      //  クエリー送信失敗
      exit("MySQLクエリー送信エラー<br />" .
            mysqli_error($Link) . "<br />" .
            $SQL);
    }

    //  連想配列への抜出（先頭行）
    $Row = mysqli_fetch_array($SqlRes);

    //  抜き出されたレコード件数を求める
    $NumRow = mysqli_num_rows($SqlRes);

    //  MySQLのメモリ解放(selectの時のみ)
    mysqli_free_result($SqlRes);

    //  MySQLとの切断
    if(!mysqli_close($Link)){
      exit("MySQL切断エラー");
    }

    if($NumRow != 0){
        if($Row["mem_pass"]==$MemPass){
            $_SESSION["MemMail"] = $Row["mem_mail"];
            $_SESSION["MemName"] = $Row["mem_fk"].$Row["mem_gk"];
            header("Location: pay_info.php");
            exit();
        }else{
            $msg = "『組み合わせが誤っています』";
            header("Location: select_ticket.php?bstatus=0");
            exit();
        }
    }else{
        $msg = "『入力されたメールアドレスは登録されていません』";
        header("Location: select_ticket.php?bstatus=0");
        exit();
    }
}

if($status == "2"){
    unset($_SESSION["MemMail"]);
    unset($_SESSION["MemName"]);
    header("Location: select_ticket.php?bstatus=1");
    exit();
}
?>