<?php 
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
Include("mypage_session.php");

 $mail              = $_GET["mail"];
 $pass              = $_GET["pass"];
 $mem_name_kanji    = $_GET["mem_name_kanji"];
 $mem_name_furigana = $_GET["mem_name_furigana"];
 $yuubinn1          = $_GET["yuubinn1"];
 $yuubinn2          = $_GET["yuubinn2"];
 $ken               = $_GET["ken"];
 $tyou              = $_GET["tyou"];
 $banchi            = $_GET["banchi"];
 $denwa             = $_GET["denwa"];
 $errflg            = 0;

//変更前のメールアドレス
 $MemMail = $_GET["MemMail"];

//入力チェック
 
//メールアドレス
 $EMmail = "";
 $match_string = "|^[a-zA-Z0-9.-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9-]+)*$|";
if($mail == ""){
  $EMmail = "未入力です。";
  $errflg = 1;
}else if(!preg_match($match_string,$mail)){
	$EMmail = "メールアドレスの正規表現が正しくありません。";
	$errflg = 1;
}else if(mb_strlen($mail) > 100){
	$EMpass = "100文字までです";
    $errflg = 1;
}else if($mail != $MemMail){

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
$SQL = "select * from t_member where mem_mail = '". $MemMail ."'";
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

/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["mem_mail"]
$RowAry[0]["mem_pass"]
$RowAry[0]["mem_name_kanji"]
$RowAry[0]["mem_name_furigana"]
$RowAry[0]["mem_sex"]
$RowAry[0]["mem_birth"]
$RowAry[0]["mem_post"]
$RowAry[0]["mem_pref"]
$RowAry[0]["mem_city"]
$RowAry[0]["mem_add"]
$RowAry[0]["mem_tel"]
$RowAry[0]["mem_reg"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

for($i=0;$i<$NumRows;$i++){
	if($mail == $RowAry[$i]["mem_mail"]){
		$EMmail = "既に存在しているメールアドレスがあるため、このメールアドレスに変更することは出来ません。";
        $errflg = 1;
	}
}


}


//パスワード
 $EMpass = "";
 $match_string2 = "|^[a-zA-Z0-9.-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9-]+)*$|";
 
 if($pass == ""){
     $EMpass = "未入力です。";
     $errflg = 1;
 }else if(preg_match($match_string2,$pass)){
     $EMpass = "半角英数字のみです。";
     $errflg = 1;
 }else if(mb_strlen($pass) > 20){
     $EMpass = "20文字までです";
     $errflg = 1;
 }


//名前
 $EMmem_name_kanji = "";

 if($mem_name_kanji == ""){
     $EMmem_name_kanji = "未入力です。";
     $errflg = 1;
 }else if(mb_strlen($mem_name_kanji) > 20){
     $EMmem_name_kanji = "20文字までです";
     $errflg = 1;
 }


//名前（フリガナ）
 $EMmem_name_furigana = "";
 $match_string3 = "/[^ァ-ヶー^\s　]/u";

 if($mem_name_furigana == ""){
     $EMmem_name_furigana = "未入力です。";
     $errflg = 1;
 }else if(preg_match($match_string3,$mem_name_furigana)){
     $EMmem_name_furigana = "全角カタカナのみです。";
     $errflg = 1;
 }else if(mb_strlen($mem_name_furigana) > 20){
     $EMmem_name_furigana = "20文字までです。";
     $errflg = 1;
 }


//郵便番号
$EMyuubinn = "";
$match_string4 = "/^[0-9]{3}-[0-9]{4}$/";

if($yuubinn1 == ""){
     $EMyuubinn = "未入力です。";
     $errflg = 1;
 }else if($yuubinn2 == ""){
     $EMyuubinn = "未入力です。";
     $errflg = 1;
 }else{
     $yuubinn = $yuubinn1."-".$yuubinn2;
     if(!preg_match($match_string4,$yuubinn)) {
     $EMyuubinn = "正しくない郵便番号です。";
     $errflg = 1;
     }
 }


//住所（県）
$EMken = "";

if($ken == ""){
     $EMken = "未入力です。";
     $errflg = 1;
 }else if(mb_strlen($ken) > 4){
     $EMken = "4文字までです。";
     $errflg = 1;
 }


//住所（市）
$EMtyou = "";

if($tyou == ""){
     $EMtyou = "未入力です。";
     $errflg = 1;
 }else if(mb_strlen($tyou) > 20){
     $EMtyou = "20文字までです。";
     $errflg = 1;
 }


//住所（番地以降）
$EMbanchi = "";

if($banchi == ""){
     $EMbanchi = "未入力です。";
     $errflg = 1;
 }else if(mb_strlen($banchi) > 20){
     $EMken = "20文字までです。";
     $errflg = 1;
}


//電話番号
$EMdenwa = "";
$match_string5 = "/^([0-9]{10,11})$/";

if($denwa == ""){
     $EMdenwa = "未入力です。";
     $errflg = 1;
 }else if(!preg_match($match_string5,$denwa)){
     $EMdenwa = "10～11桁の英数字のみです。";
     $errflg = 1;
 }


//入力チェック後の分岐ルート

 if($errflg == 1){
 
 header("Location: /halcinema/user/KAIINNhenkou_mypage.php?mail=".$mail."&pass=".$pass."&mem_name_kanji=".$mem_name_kanji."&mem_name_furigana=".$mem_name_furigana."&yuubinn1=".$yuubinn1."&yuubinn2=".$yuubinn2."&ken=".$ken."&tyou=".$tyou."&banchi=".$banchi."&denwa=".$denwa."&EMmail=".$EMmail."&EMpass=".$EMpass."&EMmem_name_kanji=".$EMmem_name_kanji."&EMmem_name_furigana=".$EMmem_name_furigana."&EMyuubinn=".$EMyuubinn."&EMken=".$EMken."&EMtyou=".$EMtyou."&EMbanchi=".$EMbanchi."&EMdenwa=".$EMdenwa);
 exit;
 
 }else{
 
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
$SQL = "update t_member set mem_mail='".$mail."', mem_pass='".$pass."', mem_name_kanji='".$mem_name_kanji."' , mem_name_furigana='".$mem_name_furigana."' , mem_post='".$yuubinn."', mem_pref='".$ken."', mem_city='".$tyou."', mem_add='".$banchi."', mem_tel='".$denwa."'";
$SQL .= " where mem_mail = '".$MemMail."'";

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


session_unset();
$_SESSION["MemMail"] = $mail;
$_SESSION["MemName"] = $mem_name_kanji;
header("Location: /halcinema/user/KAIINNhenkouOK_mypage.php");
exit;

}
 
?>