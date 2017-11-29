<?php
$pageTitle = "内容確認 | 新規会員登録";
$mem_fk = "";
$mem_gk = "";
$mem_ff = "";
$mem_gf = "";
$mem_sex = "";
$disp_mem_sex = "";
$mem_birth = "";
$mem_tel = "";
$mem_post = "";
$mem_pref = "";
$mem_city = "";
$mem_add = "";
$mem_mail = "";
$mem_pass = "";
if(isset($_POST["next"])){
    $mem_fk = $_POST["mem_fk"];
    $mem_gk = $_POST["mem_gk"];
    $mem_ff = $_POST["mem_ff"];
    $mem_gf = $_POST["mem_gf"];
    $mem_sex = $_POST["mem_sex"];
    if($mem_sex == "1"){
        $disp_mem_sex = "男";
    }else if($mem_sex == "2"){
        $disp_mem_sex = "女";
    }
    $mem_birth = $_POST["mem_birth"];
    $mem_tel = $_POST["mem_tel"];
    $mem_post = $_POST["mem_post"];
    $mem_pref = $_POST["mem_pref"];
    $mem_city = $_POST["mem_city"];
    $mem_add = $_POST["mem_add"];
    $mem_mail = $_POST["mem_mail"];
    $mem_pass = $_POST["mem_pass"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<? include("../../../head.php"); ?>
<body class="account_create_chk">
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span class="pan_padding">会員情報の入力</span><span>&gt;</span><span id="now" class="pan_padding">会員情報の確認</span><span>&gt;</span><span class="pan_padding">登録完了</span></p>
                <h1>会員登録をご確認ください。</h1>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <p>
                        <h3>漢字（姓）</h3>
                        <?php print $mem_fk; ?>
                    </p>
                    <p>
                        <h3>漢字（名）</h3>
                        <?php print $mem_gk; ?>
                    </p>
                    <p>
                        <h3>フリガナ（姓）</h3>
                        <?php print $mem_ff; ?>
                    </p>
                    <p>
                        <h3>フリガナ（名）</h3>
                        <?php print $mem_gf; ?>
                    </p>
                </div>
                <div id="sex">
                    <p>
                        <h2>性別（※必須項目）</h2>
                        <?php print $disp_mem_sex; ?>
                    </p>
                </div>
                <div id="birth">
                    <p>
                        <h2>生年月日（※必須項目）</h2>
                        <?php print $mem_birth; ?>
                    </p>
                </div>
                <div id="tel">
                    <p>
                        <h2>お電話番号（※必須項目）</h2>
                        <?php print $mem_tel; ?>
                    </p>
                </div>
                <div id="address">
                    <h2>ご住所（※必須項目）</h2>
                    <p>
                        <h3>郵便番号</h3>
                        <?php print $mem_post; ?>
                    </p>
                    <p>
                        <h3>都道府県</h3>
                        <?php print $mem_pref; ?>
                    </p>
                    <p>
                        <h3>市区町村</h3>
                        <?php print $mem_city; ?>
                    </p>
                    <p>
                        <h3>番地以降</h3>
                        <?php print $mem_add; ?>
                    </p>
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <p>
                        <h3>PC・スマートフォン</h3>
                        <?php print $mem_mail; ?>
                    </p>
                </div>
                <div id="pass">
                    <h2>パスワード（※必須項目）</h2>
                    <p>
                        ※個人情報保護の為表示しません。
                    </p>
                </div>
                <form action="ex.php" method="post">
                    <input type="hidden" name="mem_fk" value="<?php print $mem_fk; ?>">
                    <input type="hidden" name="mem_gk" value="<?php print $mem_gk; ?>">
                    <input type="hidden" name="mem_ff" value="<?php print $mem_ff; ?>">
                    <input type="hidden" name="mem_gf" value="<?php print $mem_gf; ?>">
                    <input type="hidden" name="mem_sex" value="<?php print $mem_sex; ?>">
                    <input type="hidden" name="mem_birth" value="<?php print $mem_birth; ?>">
                    <input type="hidden" name="mem_tel" value="<?php print $mem_tel; ?>">
                    <input type="hidden" name="mem_post" value="<?php print $mem_post; ?>">
                    <input type="hidden" name="mem_pref" value="<?php print $mem_pref; ?>">
                    <input type="hidden" name="mem_city" value="<?php print $mem_city; ?>">
                    <input type="hidden" name="mem_add" value="<?php print $mem_add; ?>">
                    <input type="hidden" name="mem_mail" value="<?php print $mem_mail; ?>">
                    <input type="hidden" name="mem_pass" value="<?php print $mem_pass; ?>">
                    <div id="next_area">
                        <input id="next" type="submit" name="next" value="登録確定">
                    </div>
                    <div id="back_area">
                        <input id="back" type="submit" name="back" value="戻る">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>
