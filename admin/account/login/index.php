<?php
header('Content-Type:text/html; charset=UTF-8');
$pageTitle = '管理者ログイン';
$errMsg = $num = '';
if(isset($_GET['err'])){
    $num = $_GET['num'];
    if($_GET['err'] === '1'){
        $errMsg = 'ログイン失敗：パスワードが誤っています';
    }else if($_GET['err'] === '2'){
        $errMsg = 'ログイン失敗：該当データは存在しません';
    }
}
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="admin-login">
    <h1 class="admin-login__title">halcinema admin</h1>
    <?php if($errMsg !== ''): ?>
    <p class="admin-login__msg"><?= $errMsg ?></p>
    <?php endif; ?>
    <form action="chk.php" method="post">
        <input class="admin-login-form__text" type="text" name="num" value="<?= $num ?>" placeholder="管理者番号" required>
        <input class="admin-login-form__text" type="password" name="pass" placeholder="パスワード" required>
        <input class="admin-login-form__submit" type="submit" name="btn" value="→ログイン">
    </form>
</body>
</html>
