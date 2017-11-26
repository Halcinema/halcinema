<?php session_start();
header("Content-Type:text/html; charset=UTF-8");

if(isset($_POST["selected"])){
    if(isset($_SESSION["seats"])){
        unset($_SESSION["seats"]);
    }
    $selected = $_POST["selected"];
    $_SESSION["seats"] = $selected;
}

if(isset($_POST["noLoginBuy"])){
    header("Location: user_info.php");
    exit();
}

if(isset($_POST["loginBuy"])){
    header("Location: pay_info.php");
    exit();
}

if(isset($_POST["login"])){
    $MemMail = $_POST["txtMail"];
    $MemPass = $_POST["txtPass"];

    include("../mysqlenv.php");

    if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
        exit("MySQL接続エラー<br />" . mysqli_connect_error());
    }

    $SQL = "set names utf8";
    if(!mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . $SQL);
    }

    if(!mysqli_select_db($Link,$DB)){
      exit("MySQLデータベース選択エラー<br />" . $DB);
    }

    $SQL = "select * from t_member where mem_mail='".$MemMail."'";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
    }

    $Row = mysqli_fetch_array($SqlRes);

    $NumRow = mysqli_num_rows($SqlRes);

    mysqli_free_result($SqlRes);

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
            header("Location: select_ticket.php?loginErr=1");
            exit();
        }
    }else{
        header("Location: select_ticket.php?loginErr=2");
        exit();
    }
}

if(isset($_POST["logout"])){
    unset($_SESSION["MemMail"]);
    unset($_SESSION["MemName"]);
    header("Location: select_ticket.php");
    exit();
}

?>
