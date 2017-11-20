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

$Email = "";
$Pass = "";
$ReUrl = "";

//アクセス元URL取得
if(isset($_POST["reurl"])){
    $ReUrl = $_POST["reurl"];
}else{
    $ReUrl = $_SERVER['HTTP_REFERER'];
}

if(isset($_POST["next"])){
    $Email = $_POST["email"];
    $Pass = $_POST["pass"];
    
    include("../../mysqlenv.php");
    
    //  MySQLとの接続開始
    if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
      //  うまく接続できなかった
      exit("MySQL接続エラー<br />" . mysqli_connect_error());
    }

    //  クエリー送信(文字コード)
    $SQL = "set names utf8";
    if(!mysqli_query($Link,$SQL)){
      //  クエリー送信失敗
      exit("MySQLクエリー送信エラー<br />" . $SQL);
    }

    //  MySQLデータベース選択
    if(!mysqli_select_db($Link,$DB)){
      //  MySQLデータベース選択失敗
      exit("MySQLデータベース選択エラー<br />" . $DB);
    }

    //  クエリー送信(選択クエリー)
    $SQL = "select * from t_member where mem_mail = '".$Email."'";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
      //  クエリー送信失敗
      exit("MySQLクエリー送信エラー<br />" .
            mysqli_error($Link) . "<br />" . $SQL);
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
        if($Row["mem_pass"]==$Pass){
            session_start();
            $_SESSION["MemMail"] = $Row["mem_mail"];
            $_SESSION["MemName"] = $Row["mem_fk"].$Row["mem_gk"];
            header("Location: ".$ReUrl);
            exit;
        }else{
            $msg = "組み合わせが誤っています";
            header("Location: /halcinema/user/account/login/index.php?ReUrl=".$ReUrl."&msg=".$msg);
            exit;
        }
    }else{
        $msg = "該当データは存在しません";
        header("Location: /halcinema/user/account/login/index.php?ReUrl=".$ReUrl."&msg=".$msg);
        exit;
    }
}
?>