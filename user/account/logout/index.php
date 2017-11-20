<?php
/*-----------------------------------------------------------------------------
  概要      :ログアウト処理
            :
  作成者    :渡辺裕人
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/

$ReUrl = "";

//アクセス元URL取得
    $ReUrl = $_SERVER['HTTP_REFERER'];

//処理部
session_start();
session_unset();
header("Location: ".$ReUrl);
exit;

//  HTTPヘッダーで文字コードを指定
//header("Content-Type:text/html; charset=UTF-8");
?>