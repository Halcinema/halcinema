<?php
header("Content-Type:text/html; charset=UTF-8");
//処理部

$Num = "";
$Pass = "";

if(isset($_POST["btn"])){
    $Num = $_POST["num"];
    $Pass = $_POST["pass"];

    include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/mysqlenv.php");

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
    $SQL = "select t_admin.*, t_theater.* from t_admin, t_theater";
    $SQL .= " where admin_num = '".$Num."' AND t_admin.the_num = t_theater.the_num";
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
        if($Row["admin_pass"]==$Pass){
            session_start();
            $_SESSION["admin"]["adminNum"] = $Row["admin_num"];
            $_SESSION["admin"]["adminName"] = $Row["admin_name_kanji"];
            $_SESSION["admin"]["adminTheName"] = $Row["the_name"];
            header("Location: /halcinema/admin/");
            exit();
        }else{
            header("Location: /halcinema/admin/account/login/?err=1");
            exit();
        }
    }else{
        header("Location: /halcinema/admin/account/login/?err=2");
        exit();
    }
}
?>
