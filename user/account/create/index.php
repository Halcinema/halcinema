<?php $pageTitle = "内容入力 | 新規会員登録" ?>
<!DOCTYPE html>
<html lang="ja">
<? include("../../../head.php"); ?>
<body class="account_create_index">
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span id="now" class="pan_padding">会員情報の入力</span><span>&gt;</span><span class="pan_padding">会員情報の確認</span><span>&gt;</span><span class="pan_padding">登録完了</span></p>
            <form action="chk.php" method="post">
                <h1>会員登録に必要な情報を入力してください。</h1>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <h3>漢字（姓）</h3>
                    <input class="txt_box" type="text" name="mem_fk" value="">
                    <h3>漢字（名）</h3>
                    <input class="txt_box" type="text" name="mem_gk" value="">
                    <h3>フリガナ（姓）</h3>
                    <input class="txt_box" type="text" name="mem_ff" value="">
                    <h3>フリガナ（名）</h3>
                    <input class="txt_box" type="text" name="mem_gf" value="">
                </div>
                <div id="sex">
                    <h2>性別（※必須項目）</h2>
                    <div class="clearfix">
                        <div class="select_sex"><input type="radio" name="mem_sex" value="1">男</div>
                        <div class="select_sex"><input type="radio" name="mem_sex" value="2">女</div>
                    </div>
                </div>
                <div id="birth">
                    <h2>生年月日（※必須項目）</h2>
                    <input class="txt_box" type="date" name="mem_birth" value="">
                </div>
                <div id="tel">
                    <h2>お電話番号（※必須項目）</h2>
                    <h3>半角数字</h3>
                    <input class="txt_box" type="text" name="mem_tel" value="">
                </div>
                <div id="address">
                    <h2>ご住所（※必須項目）</h2>
                    <h3>郵便番号</h3>
                    <input class="txt_box" type="text" name="mem_post" value="">
                    <h3>都道府県</h3>
                    <input class="txt_box" type="text" name="mem_pref" value="">
                    <h3>市区町村</h3>
                    <input class="txt_box" type="text" name="mem_city" value="">
                    <h3>番地以降</h3>
                    <input class="txt_box" type="text" name="mem_add" value="">
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <h3>PC・スマートフォン</h3>
                    <input class="txt_box" type="email" name="mem_mail" value="">
                </div>
                <div id="pass">
                    <h2>パスワード（※必須項目）</h2>
                    <h3>X文字以上</h3>
                    <input class="txt_box" type="password" name="mem_pass" value="">
                </div>
                <div id="next_area">
                    <input id="next" type="submit" name="next" value="次へ">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
