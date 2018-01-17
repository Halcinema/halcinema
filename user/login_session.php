<?php
session_start();
$MemMail = "";
$MemName = "";

//セッションにログイン情報が保存されているか判定
if(isset($_SESSION["MemMail"])){
    //保存されている場合、ログイン情報を変数に格納
    $MemMail = $_SESSION["MemMail"];
    $MemName = $_SESSION["MemName"];
}
?>
