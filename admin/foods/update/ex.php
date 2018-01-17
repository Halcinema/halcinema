<?php
include($_SERVER['DOCUMENT_ROOT']."/halcinema/admin/login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "管理／グッズ管理／グッズ修正／完了";

$upfilename = $_FILES["updata"]["name"];
$num = $_POST["num"];
//DB更新処理記述
if($upfilename == ""){
    $img = $_POST["img"];
}else{
    
//  処理部
$sizeselect = 1;
$inputfilename = $_POST["savename"];
$updir = "../upload/";
$updirimg = "../img/";
/******  カレントディレクトリにコピー
move_uploaded_file
($_FILES["updata"]["tmp_name"],
$_FILES["updata"]["name"]);
*******/
/***  指定したディレクトリに名前を変えてコピー
move_uploaded_file
($_FILES["updata"]["tmp_name"],
$updir . $inputfilename);
***/

//  uploadされた元のファイル名
$upfilename = $_FILES["updata"]["name"];
//  拡張子を取り出す
$fileex = 
substr($upfilename,
strrpos($upfilename,"."));
//  指定したディレクトリに名前を変えてコピー
//  拡張子を保持し、名前を変更する
move_uploaded_file
($_FILES["updata"]["tmp_name"],
$updirimg . $_FILES["updata"]["name"]);
/**  uploadされたディレクトリ付ファイル名
$filename = $updir . $_FILES["updata"]["name"];
****/
/***  uploadされたディレクトリ付ファイル名
$filename = $updir . $inputfilename;
***/
//  uploadされたディレクトリ付ファイル名
//  拡張子を保持し、名前を変更する
$filename = $updir . $inputfilename . $fileex;
$img = $inputfilename . $fileex;

//処理する画像を取り込む
$img_input = imagecreatefromjpeg("../img/".$_FILES["updata"]["name"]);
//50％縮小サムネイルの作成
//元の画像の横幅を求める

//サムネイル画像の保存
imagejpeg($img_input,$filename,150);

}
?>
<?php
//  処理部

$name = $_POST["name"];
$price = $_POST["price"];
//$movie = $_POST["movie"];
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
$SQL = "update t_foods set foods_name = '".$name."',foods_price = '".$price."',foods_img = '".$img."'";
$SQL .= " where foods_num='".$num."'";

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["shid"]
$RowAry[0]["shname"]
$RowAry[0]["shprice"]
$RowAry[0]["shimg"]

$RowAry[1]["shid"]
$RowAry[1]["shname"]
$RowAry[1]["shprice"]
$RowAry[1]["shimg"]
...
**********************************/



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
            <!--ここにグッズ修正完了メッセージを表示-->
            <p>修正完了しました</p>
            <!--/halcinema/admin/goods/detail.phpへの遷移リンクを設置-->
            <a href="../index.php">グッズ一覧に戻る</a>
        </div>
    </div>
</body>
</html>
