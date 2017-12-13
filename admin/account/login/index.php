<?php
$errMsg = "";
if(isset($_GET["err"])){
    if($_GET["err"] == "1"){
        $errMsg = "ログイン失敗：組み合わせが誤っています";
    }else if($_GET["err"] == "1"){
        $errMsg = "ログイン失敗：該当データは存在しません";
    }
}
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body class="admin_login">
    <div id="wrapper">
        <main>
            <h1>HALシネマ管理</h1>
            <form action="chk.php" method="post">
                <h2>ログイン</h2>
                <div id="msg">
                    <?php print $errMsg; ?>
                </div>
                <section>
                    <input type="text" name="num" placeholder="管理者番号" />
                </section>
                <section>
                    <input type="password" name="pass" placeholder="パスワード">
                </section>
                <div id="btn">
                    <input type="submit" name="btn" value="ログイン">
                </div>
            </form>
        </main>
    </div>
</body>
</html>
