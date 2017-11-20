<?php
$ReUrl = "";

//アクセス元URL取得
if(isset($_GET["ReUrl"])){
    $ReUrl = $_GET["ReUrl"];
}else{
    $ReUrl = $_SERVER['HTTP_REFERER'];
}

?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン | HALシネマ</title>
        <link rel="stylesheet" href="../../css/reset.css" type="text/css" />
        <link rel="stylesheet" href="../../css/common.css" type="text/css" />
        <link rel="stylesheet" href="../../css/login.css" type="text/css" />
</head>

<body>
    <div id="wrapper">
      <div id="contents">
            <form action="chk.php" method="post">
                <h1>ログイン</h1>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <input class="txt_box" type="email" name="email" value="">
                </div>
                <div id="pass">
                    <h2>パスワード（※必須項目）</h2>
                    <input class="txt_box" type="password" name="pass" value="">
                </div>
                <input type="hidden" name="reurl" value="<?php print $ReUrl; ?>">
                <div id="next_area">
                    <input id="next" type="submit" name="next" value="ログイン">
                </div>
                <a href="<?php print $ReUrl; ?>">ログインをキャンセル</a>
            </form>
        </div>
    </div>
</body>
</html>
