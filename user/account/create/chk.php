<?php
$pageTitle = "内容確認 | 新規会員登録";
$mem_name_kanji = "";
$mem_furigana = "";
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
    $mem_name_kanji = $_POST["mem_name_kanji"];
    $mem_name_furigana = $_POST["mem_name_furigana"];
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
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="ac">
    <ul class="ac-breadcrumbs">
        <li class="ac-breadcrumbs__item">会員情報の入力</li>
        <li class="ac-breadcrumbs__item ac-breadcrumbs__item--now">会員情報の確認</li>
        <li class="ac-breadcrumbs__item">登録完了</li>
    </ul>
    <h1 class="ac__title">会員登録をご確認ください。</h1>
    <section class="ac-form__section">
        <h2>お名前（※必須項目）</h2>
        <p>
            <h3>漢字</h3>
            <?= $mem_name_kanji ?>
        </p>
        <p>
            <h3>フリガナ</h3>
            <?= $mem_name_furigana ?>
        </p>
    </section>
    <section class="ac-form__section">
        <p>
            <h2>性別（※必須項目）</h2>
            <?= $disp_mem_sex ?>
        </p>
    </section>
    <section class="ac-form__section">
        <p>
            <h2>生年月日（※必須項目）</h2>
            <?= $mem_birth ?>
        </p>
    </section>
    <section class="ac-form__section">
        <p>
            <h2>お電話番号（※必須項目）</h2>
            <?= $mem_tel ?>
        </p>
    </section>
    <section class="ac-form__section">
        <h2>ご住所（※必須項目）</h2>
        <p>
            <h3>郵便番号</h3>
            <?= $mem_post ?>
        </p>
        <p>
            <h3>都道府県</h3>
            <?= $mem_pref ?>
        </p>
        <p>
            <h3>市区町村</h3>
            <?= $mem_city ?>
        </p>
        <p>
            <h3>番地以降</h3>
            <?= $mem_add ?>
        </p>
    </section>
    <section class="ac-form__section">
        <h2>メールアドレス（※必須項目）</h2>
        <p>
            <h3>PC・スマートフォン</h3>
            <?= $mem_mail ?>
        </p>
    </section>
    <section class="ac-form__section">
        <h2>パスワード（※必須項目）</h2>
        <p>
            ※個人情報保護の為表示しません。
        </p>
    </section>
    <form action="ex.php" method="post">
        <input type="hidden" name="mem_name_kanji" value="<?= $mem_name_kanji ?>">
        <input type="hidden" name="mem_name_furigana" value="<?= $mem_name_furigana ?>">
        <input type="hidden" name="mem_sex" value="<?= $mem_sex ?>">
        <input type="hidden" name="mem_birth" value="<?= $mem_birth ?>">
        <input type="hidden" name="mem_tel" value="<?= $mem_tel ?>">
        <input type="hidden" name="mem_post" value="<?= $mem_post ?>">
        <input type="hidden" name="mem_pref" value="<?= $mem_pref ?>">
        <input type="hidden" name="mem_city" value="<?= $mem_city ?>">
        <input type="hidden" name="mem_add" value="<?= $mem_add ?>">
        <input type="hidden" name="mem_mail" value="<?= $mem_mail ?>">
        <input type="hidden" name="mem_pass" value="<?= $mem_pass ?>">
        <section class="ac-form__section">
            <input class="ac-form__submit" type="submit" name="next" value="登録確定">
        </section>
        <section class="ac-form__section">
            <input class="ac-form__submit js-go-create-index" type="submit" name="back" value="戻る">
        </section>
    </form>
</body>
</html>
