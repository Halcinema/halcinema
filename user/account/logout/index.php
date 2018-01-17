<?php
header('Content-Type:text/html; charset=UTF-8');
$reUrl = '';
$reUrl = $_SERVER['HTTP_REFERER'];
session_start();
unset($_SESSION['MemMail']);
header('Location: '.$reUrl);
exit();
?>
