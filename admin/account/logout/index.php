<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
unset($_SESSION["admin"]);
header("Location: /halcinema/admin/account/login/index.php");
exit();
?>
