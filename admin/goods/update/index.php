<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ修正／入力";

$num = $_GET["num"];

//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
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
$GO = "select * from t_goods";
$GO .= " where goods_num = '". $num ."'";
if(!$GoSqlRes = mysqli_query($Link,$GO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $GO);
}
//  連想配列への抜出（全件配列に格納）
$Row = mysqli_fetch_array($GoSqlRes);

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
        <script src="../update.js" type="text/javascript" charset="utf-8"></script>
        <div id="main">
            <form action="/halcinema/admin/goods/update/ex.php" method="post"
enctype="multipart/form-data">
                <!--ここにグッズ修正フォームを表示-->
                <input type="hidden" value="<?php print $num ?>" name="num">
                  <h4 class="admin-heading-2">グッズ名</h4>
                  <input type="text" name="name" value="<?php print $Row["goods_name"]; ?>"><br>
                  <!-- <h4>映画のストーリ</h4> -->
                  <h4 class="admin-heading-2">グッズ価格</h4>
                  <input type="number" name="price" value="<?php print $Row["goods_price"]; ?>">円<br>
                  <h4 class="admin-heading-2">関連映画番号</h4>
                  <select name="movie" name="movie">
                <?php for($i=0;$i<$NumRows;$i++){ ?>
                      <?php if($i+1 == $Row["movie_num"]){ ?>
                  <option value="<?php print $MoRowAry[$i]["movie_num"]; ?>" selected><?php print $MoRowAry[$i]["movie_name"]; ?></option>
                      <?php }else{ ?>
                  <option value="<?php print $MoRowAry[$i]["movie_num"]; ?>"><?php print $MoRowAry[$i]["movie_name"]; ?></option>
                      <?php } ?>
                <?php } ?>
                  </select><br>
                    <!-- アップロード -->
                    <img src="../upload/<?php print $Row["goods_img"] ?>" width="200px">
                    現在の画像
                    <input type="hidden" value="<?php print $Row["goods_img"] ?>" name="img"><br>
                <div>
                    <?php print $Row["goods_img"] ?>
                </div>
                    <h4 class="admin-heading-2">アップロード</h4>
                    <input type="file" name="updata" class="up_img"/>
                    <br />
                    <h4 class="admin-heading-2">保存画像名</h4>
                    <input type="text" name="savename" class="savename_form" disabled><br>
                  <p class="center"><input type="submit" name="" value="変更" ></p>
            </form>
        </div>
    </div>
</body>
</html>
