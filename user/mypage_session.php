<?php session_start(); ?>
<?php
/*-----------------------------------------------------------------------------
  概要      :ログイン状態のチェック（インクルード用）
            :
  作成者    :渡辺裕人
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/

//処理部
$ReUrl = "";
$ReUrl = $_SERVER['HTTP_REFERER'];

//セッションにログイン情報が保存されているか判定
if(isset($_SESSION["MemMail"])){
    //保存されている場合、ログイン情報を変数に格納
    $MemMail = $_SESSION["MemMail"];
    $MemName = $_SESSION["MemName"];
}else{
    header("Location: /halcinema/user/account/login/index.php?ReUrl=".$ReUrl);
}
?>