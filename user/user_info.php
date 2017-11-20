<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ご購入者情報の入力 | HALシネマ</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/common.css" type="text/css" />
        <link rel="stylesheet" href="css/pan.css" type="text/css" />
        <link rel="stylesheet" href="css/user_info.css" type="text/css" />
</head>

<body>
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span class="pan_padding">座席・チケット選択</span><span>&gt;</span><span id="now" class="pan_padding">ご購入者情報の入力</span><span>&gt;</span><span class="pan_padding">お支払情報の入力</span><span>&gt;</span><span class="pan_padding">購入内容の確認</span><span>&gt;</span><span class="pan_padding">購入完了</span></p>
            <div id="left">
                <h1>ご購入に必要な情報を入力してください。</h1>
                <div id="name">
                    <h2>お名前（※必須項目）</h2>
                    <form action="#">
                        <h3>漢字（姓）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>漢字（名）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>フリガナ（姓）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                        <h3>フリガナ（名）</h3>
                        <input class="txt_box" type="text" name="#" value="">
                    </form>
                </div>
                <div id="tel">
                    <h2>お電話番号（※必須項目）</h2>
                    <form action="#">
                        <h3>半角数字</h3>
                        <input class="txt_box" type="text" name="#" value="">
                    </form>
                </div>
                <div id="mail">
                    <h2>メールアドレス（※必須項目）</h2>
                    <form action="#">
                        <h3>PC・スマートフォン</h3>
                        <input class="txt_box" type="email" name="#" value="">
                        <h3>確認の為、再入力してください。</h3>
                        <input class="txt_box" type="email" name="#" value="">
                    </form>
                </div>
                <div id="pay">
                    <h2>お支払い方法（※必須項目）</h2>
                    <form action="#">
                        <div class="clearfix">
                            <div class="select_pay"><input type="radio" name="" value="">クレジットカード</div>
                            <div class="select_pay"><input type="radio" name="" value="">楽天ペイ</div>
                            <div class="select_pay"><input type="radio" name="" value="">ドコモ ケータイ払い</div>
                            <div class="select_pay"><input type="radio" name="" value="">auかんたん決済</div>
                            <div class="select_pay"><input type="radio" name="" value="">ソフトバンクまとめて支払い</div>
                            <div class="select_pay"><input type="radio" name="" value="">ギフトカード</div>
                        </div>
                    </form>
                </div>
                <div id="next_area">
                    <form action="pay_info.php">
                        <input id="next" type="submit" name="next" value="次へ">
                    </form>
                </div>
                <div id="back_area">
                    <form action="select_ticket.php">
                        <input id="back" type="submit" name="back" value="戻る">
                    </form>
                </div>
                <div id="all_back_area">
                    <form action="sinema_schedule.php">
                        <input id="all_back" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
                    </form>
                </div>
            </div>
            <div id="right">
                <div id="purchase_contents">
                    <h2>ご購入内容</h2>
                    <dl>
                        <dt>作品</dt>
                        <dd>〇〇〇〇</dd>
                        <dt>日時</dt>
                        <dd>XXXX年XX月XX日(X)<br>XX:XX~XX:XX</dd>
                        <dt>座席・券種</dt>
                        <dd>スクリーン名<br>XX 〇〇／XXXX円<br>XX 〇〇／XXXX円<br>XX 〇〇／XXXX円</dd>
                        <dt>劇場</dt>
                        <dd>〇〇〇〇</dd>
                        <dt>合計</dt>
                        <dd>XXXX円</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
