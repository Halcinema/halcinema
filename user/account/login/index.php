<?php
$reUrl = "";
$pageTitle = 'ログイン';
if(isset($_GET["ReUrl"])){
    $reUrl = $_GET["ReUrl"];
}else{
    $reUrl = $_SERVER['HTTP_REFERER'];
}
?>


<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="login">
    <h1 class="login__title">halcinemaログイン</h1>
    <form class="login-form" action="chk.php" method="post">
        <input class="login-form__text" type="email" name="email" value="" placeholder="メールアドレス">
        <input class="login-form__text" type="password" name="pass" value="" placeholder="パスワード">
        <input type="hidden" name="reurl" value="<?= $reUrl ?>">
        <input class="login-form__submit" type="submit" name="next" value="ログイン">
    </form>
    <a href="<?= $reUrl ?>">ログインをキャンセル</a>
</body>
</html>
