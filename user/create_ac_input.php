<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>新規会員登録内容入力 | HALシネマ</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/common.css" type="text/css" />
        <link rel="stylesheet" href="css/pan.css" type="text/css" />
        <link rel="stylesheet" href="css/create_ac_input.css" type="text/css" />
</head>

<body>
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span id="now" class="pan_padding">会員情報の入力</span><span>&gt;</span><span class="pan_padding">会員情報の確認</span><span>&gt;</span><span class="pan_padding">登録完了</span></p>
            <form action="create_ac_chk.php">
                <h1>会員登録に必要な情報を入力してください。</h1>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <h3>漢字（姓）</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>漢字（名）</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>フリガナ（姓）</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>フリガナ（名）</h3>
                    <input class="txt_box" type="text" name="#" value="">
                </div>
                <div id="sex">
                    <h2>性別（※必須項目）</h2>
                    <div class="clearfix">
                        <div class="select_sex"><input type="radio" name="#" value="">男</div>
                        <div class="select_sex"><input type="radio" name="#" value="">女</div>
                    </div>
                </div>
                <div id="birth">
                    <h2>生年月日（※必須項目）</h2>
                    <input class="txt_box" type="date" name="#" value="">
                </div>
                <div id="tel">
                    <h2>お電話番号（※必須項目）</h2>
                    <h3>半角数字</h3>
                    <input class="txt_box" type="text" name="#" value="">
                </div>
                <div id="address">
                    <h2>ご住所（※必須項目）</h2>
                    <h3>郵便番号</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>都道府県</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>市町村</h3>
                    <input class="txt_box" type="text" name="#" value="">
                    <h3>番地以降</h3>
                    <input class="txt_box" type="text" name="#" value="">
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <h3>PC・スマートフォン</h3>
                    <input class="txt_box" type="email" name="#" value="">
                    <h3>確認の為、再入力してください。</h3>
                    <input class="txt_box" type="email" name="#" value="">
                </div>
                <div id="pass">
                    <h2>パスワード（※必須項目）</h2>
                    <h3>X文字以上</h3>
                    <input class="txt_box" type="password" name="#" value="">
                    <h3>確認の為、再入力してください。</h3>
                    <input class="txt_box" type="password" name="#" value="">
                </div>
                <div id="next_area">
                    <input id="next" type="submit" name="next" value="次へ">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
