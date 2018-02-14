<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ登録／入力";
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
/*
include("../../../user/mysqlenv.php");
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
$MO = "select * from t_movie";
if(!$MoSqlRes = mysqli_query($Link,$MO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $MO);
}
//  連想配列への抜出（全件配列に格納）
while($MoRow = mysqli_fetch_array($MoSqlRes)){
  //  データが存在する間処理される
  $MoRowAry[] = $MoRow;
}
//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($MoSqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($MoSqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
*/
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/common.php"); ?>
        <div id="main">
          <h3 class="admin-heading-1">追加フード情報を入力してください</h3>
            <form action="/halcinema/admin/foods/add/ex.php" method="post"
enctype="multipart/form-data">
                <!--ここにグッズ追加フォームを表示-->
                  <h4 class="admin-heading-2">フード名</h4>
                  <input type="text" name="name" value=""><br>
                  <!-- <h4>映画のストーリ</h4> -->
                  <h4 class="admin-heading-2">フード価格</h4>
                  <input type="number" name="price" value="">円<br>
                <!--
                  <h4 class="admin-heading-2">関連映画番号</h4>
                  <select name="movie" name="movie">
                <?php for($i=0;$i<$NumRows;$i++){ ?>
                  <option value="<?php print $MoRowAry[$i]["movie_num"]; ?>"><?php print $MoRowAry[$i]["movie_name"]; ?></option>
                <?php } ?>
                  </select><br>
                -->
                    <!-- アップロード -->
                <h4 class="admin-heading-2">アップロード</h4>
                <input type="file" name="updata" />
                <br />
                <h4 class="admin-heading-2">保存ファイル名</h4>
                <input type="text" name="savename" /><br>
                  <p class="center"><input type="submit" name="" value="追加" ></p>

            </form>
        </div>
    </div>
</body>
</html>
