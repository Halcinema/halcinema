<?php include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "購入完了 | 予約";
//if(isset($_GET["ShowId"])){
    //$ShowId = $_GET["ShowId"];
    //  MySQL関連変数を外部ファイルで持たせる
    //  外部ファイルの読み込み
/*
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

    //1件目の抽出処理
    //  クエリー送信(選択クエリー)
    $SQL = "insert into t_reservation(ticket_num, mem_mail,) where show_id='".$ShowId."'";
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

    if($NumRow == 0){
        $errMsg .= "指定上映IDに該当する席状況データが見つかりませんでした。<br />";
        $errFlg = "true";
    }
//}
*/
?>
<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="ex">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>ご購入が完了しました。</h2>
                <a href="../index.php">トップへ戻る</a>
            </div>
            <div class="right">
            </div>
        </div>
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
