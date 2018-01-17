<?php $pageTitle = "内容入力 | 新規会員登録" ?>
<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="ac">
    <ul class="ac-breadcrumbs">
        <li class="ac-breadcrumbs__item ac-breadcrumbs__item--now">会員情報の入力</li>
        <li class="ac-breadcrumbs__item">会員情報の確認</li>
        <li class="ac-breadcrumbs__item">登録完了</li>
    </ul>
    <h1 class="ac__title">会員登録に必要な情報を入力してください。</h1>
    <form action="chk.php" method="post">
        <section class="ac-form__section">
            <h2>お名前（※必須項目）</h2>
            <h3>漢字</h3>
            <input class="ac-form__text" type="text" name="mem_name_kanji" value="">
            <h3>フリガナ</h3>
            <input class="ac-form__text" type="text" name="mem_name_furigana" value="">
        </section>
        <section class="ac-form__section">
            <h2>性別（※必須項目）</h2>
            <section class="clearfix">
                <section class="select_sex"><input type="radio" name="mem_sex" value="1">男</section>
                <section class="select_sex"><input type="radio" name="mem_sex" value="2">女</section>
            </section>
        </section>
        <section class="ac-form__section">
            <h2>生年月日（※必須項目）</h2>
            <input class="ac-form__text" type="date" name="mem_birth" value="">
        </section>
        <section class="ac-form__section">
            <h2>お電話番号（※必須項目）</h2>
            <h3>半角数字</h3>
            <input class="ac-form__text" type="text" name="mem_tel" value="">
        </section>
        <section class="ac-form__section">
            <h2>ご住所（※必須項目）</h2>
            <h3>郵便番号</h3>
            <input class="ac-form__text" type="text" name="mem_post" value="">
            <h3>都道府県</h3>
            <input class="ac-form__text" type="text" name="mem_pref" value="">
            <h3>市区町村</h3>
            <input class="ac-form__text" type="text" name="mem_city" value="">
            <h3>番地以降</h3>
            <input class="ac-form__text" type="text" name="mem_add" value="">
        </section>
        <section class="ac-form__section">
            <h2>メールアドレス（※必須項目）</h2>
            <h3>PC・スマートフォン</h3>
            <input class="ac-form__text" type="email" name="mem_mail" value="">
        </section>
        <section class="ac-form__section">
            <h2>パスワード（※必須項目）</h2>
            <h3>X文字以上</h3>
            <input class="ac-form__text" type="password" name="mem_pass" value="">
        </section>
        <section class="ac-form__section">
            <input class="ac-form__submit" type="submit" name="next" value="次へ">
        </section>
    </form>
</body>
</html>
