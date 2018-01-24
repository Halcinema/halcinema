<?php
session_start();
$AdminNum = "";
$AdminName = "";
$AdminTheName = "";

//セッションにログイン情報が保存されているか判定
if(isset($_SESSION["admin"])){
    //保存されている場合、ログイン情報を変数に格納
    $AdminNum = $_SESSION["admin"]["adminNum"];
    $AdminName = $_SESSION["admin"]["adminName"];
    $AdminTheName = $_SESSION["admin"]["adminTheName"];
    $AdminTheNum = $_SESSION["admin"]["adminTheNum"];
}else{
    header("Location: /halcinema/admin/account/login/");
}
?>
