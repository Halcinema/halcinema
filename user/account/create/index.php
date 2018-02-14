<?php $pageTitle = "内容入力 | 新規会員登録" ?>
<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="ac">
    <h1 class="ac__title">halcinema新規会員登録</h1>
    <ul class="ac-breadcrumbs">
        <li class="ac-breadcrumbs__item">
            <span class="ac-breadcrumbs__text ac-breadcrumbs__text--now">会員情報の入力</span>
        </li>
        <li class="ac-breadcrumbs__item">
            <span class="ac-breadcrumbs__text">会員情報の確認</span>
        </li>
        <li class="ac-breadcrumbs__item">
            <span class="ac-breadcrumbs__text">登録完了</span>
        </li>
    </ul>
    <!--<h1 class="ac__description">会員登録に必要な情報を入力してください。</h1>-->
    <form class="ac-form" action="chk.php" method="post">
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">お名前</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">漢字</h3>
                <input class="ac-form__text" type="text" name="mem_name_kanji" value="">
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">フリガナ</h3>
                <input class="ac-form__text" type="text" name="mem_name_furigana" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">性別</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item ac-form__item--ml220">
                <input type="radio" name="mem_sex" value="1">男
                <input type="radio" name="mem_sex" value="2">女
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">生年月日</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item ac-form__item--ml220">
                <input class="ac-form__text" type="date" name="mem_birth" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">お電話番号</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">半角数字</h3>
                <input class="ac-form__text" type="text" name="mem_tel" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">ご住所</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">郵便番号</h3>
                <input class="ac-form__text" type="text" name="mem_post" value="">
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">都道府県</h3>
                <input class="ac-form__text" type="text" name="mem_pref" value="">
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">市区町村</h3>
                <input class="ac-form__text" type="text" name="mem_city" value="">
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">番地以降</h3>
                <input class="ac-form__text" type="text" name="mem_add" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item">
                <h2 class="ac-form__title">メールアドレス</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">PC・スマートフォン</h3>
                <input class="ac-form__text" type="email" name="mem_mail" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <div class="ac-form__item ">
                <h2 class="ac-form__title">パスワード</h2>
                <span class="ac-form__required">必須</span>
            </div>
            <div class="ac-form__item">
                <h3 class="ac-form__sub-title">X文字以上</h3>
                <input class="ac-form__text" type="password" name="mem_pass" value="">
            </div>
        </section>
        <section class="ac-form__section">
            <input class="ac-form__submit" type="submit" name="next" value="次へ">
        </section>
    </form>
    <footer class="ac__footer">&copy;2018&nbsp;halcinema</footer>
</body>
</html>
