<?php
$Msg = "";
if(isset($_GET["msg"])){
    $Msg = $_GET["msg"];
}
?>
<!DOCTYPE html>
<?php include("../../../head.php"); ?>
<body class="admin_login">
    <div id="wrapper">
        <main>
            <h1>HALシネマ管理</h1>
            <form action="chk.php" method="post">
                <h2>ログイン</h2>
                <div id="msg">
                    <?php print $Msg; ?>
                </div>
                <section>
                    <h3>管理者番号（※必須項目）</h3>
                    <input type="text" name="num">
                </section>
                <section>
                    <h3>パスワード（※必須項目）</h3>
                    <input type="password" name="pass">
                </section>
                <div id="btn">
                    <input type="submit" name="btn" value="ログイン">
                </div>
            </form>
        </main>
    </div>
</body>
</html>
