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
mysqli_free_result($FoSqlRes);

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
            <div class="shohin_detail">
                <h2>商品の情報をここに表示します。</h2>
                
            </div>
            <h3 class="admin-heading-1">グッズ管理</h3>
            <a href="/halcinema/admin/foods/add/index.php"><div class="goods_center_button">フード登録</div></a>
            <!--ここにフード一覧を表示-->
            <h3 class="admin-heading-1">グッズ一覧・編集・削除</h3>
            <ul>
            <?php for($i=0;$i<$FoNumRows;$i++){ ?>
                <?php
                  if(10 <= mb_strlen($FoRowAry[$i]["foods_name"])){  
                  $foods_name = mb_substr($FoRowAry[$i]["foods_name"],0,10)."...";
                  }else{
                  $foods_name = $FoRowAry[$i]["foods_name"];
                  }
                ?>           
                <li>
                    <h4>
                        <a href="detail.php?num=<?php print $FoRowAry[$i]["foods_num"] ?>">
                        <?php print $FoRowAry[$i]["foods_name"] ?>
                        </a>
                        <form class="shohin_<?php print $i; ?>">
                        <input type="submit" value="詳細表示">
                        </form>
                    </h4>
<script>
$('.shohin_<?php print $i; ?>').submit(function() {
    var str = "<table>";
    str += "<tr><th>名称</th><td><?php print $FoRowAry[$i]["foods_name"] ?></td></tr>";
    str += "<tr><th>金額</th><td><?php print $FoRowAry[$i]["foods_price"] ?>円</td></tr>";
    str += "</table>";
    str += "<img src='upload/<?php print $FoRowAry[$i]["foods_img"]; ?>' style = 'width:100%;'>";
    str += "<p><a href='update/index.php?num=<?php print $FoRowAry[$i]["foods_num"] ?>' >編集</a><a href='delete/index.php?num=<?php print $FoRowAry[$i]["foods_num"] ?>' >削除</a></p>"
    $(".shohin_detail").html(str).fadeIn("slow");
    //$("#message").css("display","none");
    //mapDisp(bango);
    return false;
});
</script>
                    <div class="admin_foods_img" style="background-image: url(upload/<?php print $FoRowAry[$i]["foods_img"] ?>);">
                    </div><!--
                    <img src="upload/<?php print $FoRowAry[$i]["foods_img"] ?>" width="150px" height="150px">
                    <?php print $FoRowAry[$i]["movie_num"] ?>-->
                    <p>
                <a href="update/index.php?num=<?php print $FoRowAry[$i]["foods_num"] ?>">
                    編集
                </a>
                <a href="delete/index.php?num=<?php print $FoRowAry[$i]["foods_num"] ?>">
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
    #wrapper{
        position: relative;
        width: 75%;
    }
    .goods_center_button{
        text-align: center;
        width: 200px;
        margin: 15px auto;
        padding: 15px;
        border: 1px solid #000;
        border-radius: 5px;
    }
    .admin_foods_img{
        background-size: auto 150px;
        background-repeat: no-repeat;
        background-position: center;
        max-width: 100%;
        min-height: 100px;
    }
    .admin_foods_img:hover{
        background-size: 150px auto; 
    }
    .goods_index ul{
        display: flex;
        flex-wrap: wrap;
    }
    .goods_index ul li{
        border: 1px solid #000;
        box-sizing: border-box;
        width: 200px;
        min-height: 150px;
    }
    .goods_index ul li:hover{
        border-color: red;
    }
    .goods_index ul li img{
        vertical-align: bottom;
    }
    .shohin_detail{
        position: fixed;
        border: 1px solid #000;
        min-height: 100%;
        width: 25%;
        right: 0;
    }

</style>
