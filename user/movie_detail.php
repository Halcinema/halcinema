<?php  ?>
<?php
//  HTTPヘッダーで文字コードを指定
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定
//処理部


include ("login_session.php");
//print $MemMail;
//映画の情報の処理
if(isset($_GET["num"])){
    $movie_num = $_GET["num"];
}else if(isset($_POST["num"])){
    $movie_num = $_POST["num"];
}else{
    $movie_num = "";
}

if(isset($_POST["mail_session"])){
    $mail = 1;
}else{
    $mail = "";
}
if(isset($_POST["review_title"])){
    $review_title = $_POST["review_title"];
}else{
    $review_title = "";
}
if(isset($_POST["review_contents"])){
    $review_contents = $_POST["review_contents"];
}else{
    $review_contents = "";
}
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

   
if($mail == 1){
    
    // 改行処理
$review_contents = nl2br($review_contents);
    
$RE = "insert into t_review(
movie_num,
mem_mail,
review_title,
review_contents,
review_post
)values(
'" . $movie_num . "',
'".$MemMail."',
'" . $review_title . "',
'" . $review_contents . "',
now())";

if(!$ReSqlRes = mysqli_query($Link,$RE)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $RE);
}
}
   
 //  クエリー送信(選択クエリー)
$CO = "select * from t_review";
$CO .= " where movie_num = '" . $movie_num . "'";
if(!$CoSqlRes = mysqli_query($Link,$CO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $CO);
}

//  連想配列への抜出（全件配列に格納）
while($CoRow = mysqli_fetch_array($CoSqlRes)){
  //  データが存在する間処理される
  $CoRowAry[] = $CoRow;
}

//  抜き出されたレコード件数を求める
$CoNumRows = mysqli_num_rows($CoSqlRes);
$ViewNum = 3;

//映画情報詳細

//  クエリー送信(選択クエリー)
$MO = "select * from t_movie";
$MO .= " where movie_num = '" . $movie_num . "'";
if(!$GuSqlRes = mysqli_query($Link,$MO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $GU);
}

//  連想配列への抜出（全件配列に格納）
$GuRow = mysqli_fetch_array($GuSqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($CoSqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($GuSqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}





$date = date('Ymd');
$flg="";
if($date <= (date('Ymd', strtotime($GuRow["movie_start"])))){
    $flg="1";
}else{
    $flg="2";
}
?>

<?php
//  処理部
//  GETでデータ（ページ番号）を受信している？
if(isset($_GET["p"])){
  //  受信できた
  $page = $_GET["p"];
}else{
  //  受信できなかった
  $page = 1;
}
?>


<!DOCTYPE html>

<html lang="ja">
<head>

<meta charset="utf-8"/>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/movie_detail.css" rel="stylesheet" type="text/css" />
<link href="css/sub_common.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<title>美しい星</title>

    
<script type="text/javascript">
<!--
function formCheck(){
    var flag = 0;
    if( document . review_form . review_title . value == "" ){
        flag = 1;
        document . getElementById( 'notice-input-text-1' ) . style . display = "block";
    }else{
        document . getElementById( 'notice-input-text-1' ) . style . display = "none";
    }
    if( document . review_form . review_contents . value == "" ){
        flag = 1;
        document . getElementById( 'notice-textarea-1' ) . style . display = "block";
    }else{
        document . getElementById( 'notice-textarea-1' ) . style . display = "none";
    }
    if( flag ){
        return false;
    }else{
        return true;
    }
}
// -->
</script>
    
    </head>

<body>
<?php include("header.php"); ?>
    <div id="wrapper">
<h1 class="movie_name"><?php print $GuRow["movie_name"]; ?></h1>
<section class="clearfix">
  <div id="movies">
    <div id="movie_img"> <img src="../admin/images/<?php print $GuRow["movie_file"]; ?>" width="300px"> </div>
    <div id="movie_detail"><?php print $GuRow["movie_story"]; ?>
      <ul class="info_movie">
        <li class="info_left">監督</li>
        <li class="info_right"><?php print $GuRow["movie_sc"]; ?></li>
        <li class="info_left">キャスト</li>
        <li class="info_right"><?php print $GuRow["movie_cast"]; ?></li>
        <li class="info_left">レイティング</li>
        <li class="info_right"><?php print $GuRow["movie_rating"]; ?></li>
        <li class="info_left">備考</li>
        <li class="info_right"><?php print $GuRow["movie_note"]; ?></li>
          <li class="info_left">上映時間</li>
          <li class="info_right"><?php print $GuRow["movie_st"]; ?>分</li>
        <li class="info_left">公式サイト</li>
        <li class="info_right"><a href="<?php print $GuRow["movie_url"]; ?>">美しい星</a></li>
          
          
          <?php if($flg == 1){ ?>
        <li class="info_left">公開予定日</li>
        <li class="info_right"><?php print date('Y年n月j日', strtotime($GuRow["movie_start"])); ?>公開</li>
          
          <?php }else{ ?>
        <li class="info_left">公開期間</li>
        <li class="info_right"><?php print date('Y年n月j日', strtotime($GuRow["movie_finish"])); ?>まで公開</li>
          
          
          <?php } ?>
      </ul>
        <?php if($flg == 1){ ?>
        <a  class="back clearfix" href="movie_schedule.php">戻る</a>
        <?php }else{ ?>
        <a  class="back clearfix" href="movie_now.php">戻る</a>
        <?php } ?>
        </div>
  </div>
</section>
    </div>
<div id="coment_contents">
<?php if(isset($_SESSION["MemMail"])){ ?>
    <h2 class="let_review">レビューしよう！</h2>
    <form action="movie_detail.php" method="post" name="review_form" onsubmit="return formCheck()">
        <input type="hidden" name="num" value="<?php print $GuRow["movie_num"]; ?>">
        <input type="hidden" name="mail_session" value="<?php print $_SESSION["MemMail"]; ?>">
    <p>タイトルを入力</p>
        <input type="text" name="review_title" id="review_title" maxlength="20" placeholder="20文字以内"><br>
        <p id="notice-input-text-1" style="display: none; color: red;"> 【タイトルを入力して下さい】</p>
    <p>コメントを入力</p>
        <textarea name="review_contents" id="review_textarea" maxlength="1000" placeholder="255文字以内"></textarea>
        <p id="notice-textarea-1" style="display: none; color: red;"> 【コメントを入力して下さい】</p>
        <input type="submit" value="送信">
    </form>
<?php }else{ ?>
    
    会員登録をするとレビューが書き込めるようになります。

<?php } ?>
    
    
    <h2 class="let_review">この映画に対するみんなのレビュー</h2>

<?php if($CoNumRows != 0){ ?>
    
<p>3件ずつ表示しています。</p>
    
<?php for($i=$CoNumRows-1-($page-1)*$ViewNum;
	$i >= $CoNumRows-($page-1)*$ViewNum-$ViewNum and $i >= 0;
	$i--){ ?>
    
<div class="review_contents">
<h3 class="review_contents_title"><?php print $CoRowAry[$i]["review_title"]; ?></h3>
<?php print $CoRowAry[$i]["review_contents"]; ?>
    <p><time><?php print $CoRowAry[$i]["review_post"]; ?></time></p>
</div>
<?php } ?>
    <div id="page">
<?php if($page>1){ ?>
<a href=
"movie_detail.php?p=
<?php print $page-1; ?>&num=<?php print $GuRow["movie_num"]; ?>
">前のページ</a>
<?php } ?>
<?php 
if($CoNumRows>$page*$ViewNum){ ?>
<a href="movie_detail.php?p=<?php print $page+1; ?>&num=<?php print $GuRow["movie_num"]; ?>">次のページ</a>

<?php } ?>
    </div>
    
    <?php }else{ ?>
    
    まだコメントはありません。
    
    <?php } ?>
    
</div>
    <footer></footer>
    
</body>
