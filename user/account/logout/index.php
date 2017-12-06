<?php
$ReUrl = "";

//アクセス元URL取得
    $ReUrl = $_SERVER['HTTP_REFERER'];

//処理部
session_start();
session_unset($_SESSION["MemMail"]);
//session_unset($_SESSION["MemName"]);
header("Location: ".$ReUrl);
exit;

//  HTTPヘッダーで文字コードを指定
//header("Content-Type:text/html; charset=UTF-8");
?>
