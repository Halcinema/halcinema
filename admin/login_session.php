<?php
session_start(); ?>
<?php
/*-----------------------------------------------------------------------------
  概要      :ログイン状態のチェック（インクルード用）
            :
  作成者    :渡辺裕人
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/

//処理部
$AdminNum = "";
$AdminName = "";
$AdminTheName = "";

//セッションにログイン情報が保存されているか判定
if(isset($_SESSION["AdminNum"])){
    //保存されている場合、ログイン情報を変数に格納
    $AdminNum = $_SESSION["AdminNum"];
    $AdminName = $_SESSION["AdminName"];
    $AdminTheName = $_SESSION["AdminTheName"];
}
?>