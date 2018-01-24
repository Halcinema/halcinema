<?php
//処理部
$pageTitle = "ページ名";
include("login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "ダッシュボード";
?>
<?php
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
$SQL = "select * from t_movie";
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
<?php include("../head.php"); ?>
<body>
    <div id="wrapper">
     <?php include("common.php"); ?>
        <div id="main">
              <h3 class="admin-heading-1">追加済み映画一覧</h3>
              <?php if($NumRows != "0"){ ?>
                  <table class="show-table">
                <?php for($i=0; $i<$NumRows; $i++) { ?>
                    <th>映画番号</th><th>映画名</th><th>上映開始日</th><th>上映終了日</th><!--<th>ストーリー</th>--><th>上映時間</th><th>映画監督</th><th>キャスト</th><th>更新</th><th>削除</th>
                    <tr>
                      <td><?php echo $RowAry[$i]['movie_num']; ?></td>
                      <td><?php echo $RowAry[$i]['movie_name']; ?></td>
                      <td><?php echo $RowAry[$i]['movie_start']; ?></td>
                      <td><?php echo $RowAry[$i]['movie_finish']; ?></td>
                      <!--<td><?php //echo $RowAry[$i]['movie_story']; ?></td>-->
                      <td><?php echo $RowAry[$i]['movie_st']; ?>分</td>
                      <td><?php echo $RowAry[$i]['movie_sc']; ?></td>
                      <td><?php echo $RowAry[$i]['movie_cast']; ?></td>
                      <td><a href="movie_update.php?id=<?=$RowAry[$i]['movie_num'];?>">更新</a></td>
                      <td><a href="movie_delete.php?id=<?=$RowAry[$i]['movie_num'];?>">削除</td>
                    </tr>
                <?php } ?>
                  </table><!--ストーリ抜き　-->
              <?php }?>
        </div>
    </div>
</body>
</html>
