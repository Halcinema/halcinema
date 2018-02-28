<?php
//処理部
$pageTitle = "ページ名";
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ダッシュボード";
?>

<?php
//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/mysqlenv.php");

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
$SQL = "select * from t_member";
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

//  MySQLとの切断
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
              <h3 class="admin-heading-1">会員一覧</h3>
              <a href="/halcinema/admin/member/pdf-list.php" target="_blank">PDF出力</a>
              <?php if($NumRows != "0"){ ?>
                  <table class="show-table">
                    <th>メールアドレス</th><th>名前</th><th>詳細</th>
                <?php for($i=0; $i<$NumRows; $i++) { ?>
                    <tr>
                      <td><?php echo $RowAry[$i]['mem_mail']; ?></td>
                      <td><?php echo $RowAry[$i]['mem_name_kanji']; ?></td>
                      <td><a href="detail.php?mem_mail=<?=$RowAry[$i]['mem_mail'];?>">詳細</a></td>
                    </tr>
                <?php } ?>
                  </table>
              <?php }?>
        </div>
    </div>
</body>
</html>
