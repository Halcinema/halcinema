<?php $pageTitle = "内容確認 | 新規会員登録" ?>
<!DOCTYPE html>
<html lang="ja">
<? include("../../../head.php"); ?>
<body class="account_create_chk">
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span class="pan_padding">会員情報の入力</span><span>&gt;</span><span id="now" class="pan_padding">会員情報の確認</span><span>&gt;</span><span class="pan_padding">登録完了</span></p>
            <form action="ex.php">
                <h1>会員登録をご確認ください。</h1>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <p>
                        <h3>漢字（姓）</h3>
                        〇〇
                    </p>
                    <p>
                        <h3>漢字（名）</h3>
                        〇〇
                    </p>
                    <p>
                        <h3>フリガナ（姓）</h3>
                        〇〇〇〇
                    </p>
                    <p>
                        <h3>フリガナ（名）</h3>
                        〇〇〇〇
                    </p>
                </div>
                <div id="sex">
                    <p>
                        <h2>性別（※必須項目）</h2>
                        〇
                    </p>
                </div>
                <div id="birth">
                    <p>
                        <h2>生年月日（※必須項目）</h2>
                        XXXX年XX月XX日
                    </p>
                </div>
                <div id="tel">
                    <p>
                        <h2>お電話番号（※必須項目）</h2>
                        XXXX-XX-XXXX
                    </p>
                </div>
                <div id="address">
                    <h2>ご住所（※必須項目）</h2>
                    <p>
                        <h3>郵便番号</h3>
                        XXX-XXXX
                    </p>
                    <p>
                        <h3>都道府県</h3>
                        〇〇〇〇
                    </p>
                    <p>
                        <h3>市町村</h3>
                        〇〇〇〇
                    </p>
                    <p>
                        <h3>番地以降</h3>
                        〇〇〇〇
                    </p>
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <p>
                        <h3>PC・スマートフォン</h3>
                        XXXXXXXXXXXX
                    </p>
                </div>
                <div id="pass">
                    <h2>パスワード（※必須項目）</h2>
                    <p>
                        XXXXXXXXXXXX
                    </p>
                </div>
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
