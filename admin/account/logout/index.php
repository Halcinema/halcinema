<?php
session_start();
/*-----------------------------------------------------------------------------
  概要      :ログアウト処理
            :
  作成者    :渡辺裕人
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//処理部
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
unset($_SESSION["AdminNum"]);
unset($_SESSION["AdminName"]);
unset($_SESSION["AdminTheName"]);
header("Location: /halcinema/admin/account/login/index.php");
exit;
?>