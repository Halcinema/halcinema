<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／一覧表示";
?>
<?php 
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定

//処理部

/*
if(isset($_POST["house_num"])){
    $house_num = $_POST["house_num"];

*/
//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("../../user/mysqlenv.php");
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
$GO = "select * from t_goods";
if(!$GoSqlRes = mysqli_query($Link,$GO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $GO);
}
//  連想配列への抜出（全件配列に格納）
while($GoRow = mysqli_fetch_array($GoSqlRes)){
  //  データが存在する間処理される
  $GoRowAry[] = $GoRow;
}
//  抜き出されたレコード件数を求める
$GoNumRows = mysqli_num_rows($GoSqlRes);

//  クエリー送信(選択クエリー)
$FO = "select * from t_foods";
if(!$FoSqlRes = mysqli_query($Link,$FO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $FO);
}
//  連想配列への抜出（全件配列に格納）
while($FoRow = mysqli_fetch_array($FoSqlRes)){
  //  データが存在する間処理される
  $FoRowAry[] = $FoRow;
}
//  抜き出されたレコード件数を求める
$FoNumRows = mysqli_num_rows($FoSqlRes);


//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($GoSqlRes);

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
        <div id="main" class="goods_index">
            <a href="/halcinema/admin/goods/add/">グッズ登録</a>
            <!--ここにグッズ一覧を表示-->
            <ul>
            <?php for($i=0;$i<$GoNumRows;$i++){ ?>
                <li>
                    <h4>
                        <a href="detail.php?num=<?php print $GoRowAry[$i]["goods_num"] ?>">
                        <?php print $GoRowAry[$i]["goods_name"] ?>
                        </a>
                    </h4>
                    <p>
                        <?php print $GoRowAry[$i]["goods_price"] ?>
                    </p>
                    
                    <img src="upload/<?php print $GoRowAry[$i]["goods_img"] ?>" width="200px" height="150px">
                    <!--<?php print $GoRowAry[$i]["movie_num"] ?>-->
                    <p>
                <a href="update/index.php?num=<?php print $GoRowAry[$i]["goods_num"] ?>">
                    編集
                </a>
                <a href="delete/index.php?num=<?php print $GoRowAry[$i]["goods_num"] ?>">
                    削除
                </a>
                    </p>
                </li>
                
                
            <?php } ?>
            </ul>
        </div>
    </div>
</body>
</html>
<style>
    .goods_index ul{
        display: flex;
        flex-wrap: wrap;
    }
    .goods_index ul li{
        border: 1px solid #000;
    }
    .goods_index ul li:hover{
        border-color: red;
    }

</style>
