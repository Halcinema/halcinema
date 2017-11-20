<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>チケット選択 | HALシネマ</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/common.css" type="text/css" />
        <link rel="stylesheet" href="css/pan.css" type="text/css" />
        <link rel="stylesheet" href="css/select_ticket.css" type="text/css" />
</head>

<body>
    <div id="wrapper">
      <div id="contents">
            <p id="pan"><span id="now" class="pan_padding">座席・チケット選択</span><span>&gt;</span><span class="pan_padding">ご購入者情報の入力</span><span>&gt;</span><span class="pan_padding">お支払情報の入力</span><span>&gt;</span><span class="pan_padding">購入内容の確認</span><span>&gt;</span><span class="pan_padding">購入完了</span></p>
            <div id="left">
                <h1>チケットの種類をお選びください。</h1>
                <p id="attention">今から15分以内に購入が完了しない場合、自動的に座席は解除されます。</p>
                <div id="select_ticket_area">
                    <h2>スクリーン名</h2>
                    <div class="ticket">
                        <div class="clearfix">
                            <p class="seat_num">XX</p>
                            <p class="select_ticket">
                                <select name="#">
                                    <option value="#">券種を選択して下さい。</option>
                                    <option value="#">一般 1,100円</option>
                                    <option value="#">高校生 500円</option>
                                    <option value="#">大・専 500円</option>
                                    <option value="#">中・小 500円</option>
                                    <option value="#">幼児（3才～） 500円</option>
                                    <option value="#">シニア（60才以上）1,100円</option>
                                    <option value="#">障碍者割引 1,000円</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ticket">
                        <div class="clearfix">
                            <p class="seat_num">XX</p>
                            <p class="select_ticket">
                                <select name="#">
                                    <option value="#">券種を選択して下さい。</option>
                                    <option value="#">一般 1,100円</option>
                                    <option value="#">高校生 500円</option>
                                    <option value="#">大・専 500円</option>
                                    <option value="#">中・小 500円</option>
                                    <option value="#">幼児（3才～） 500円</option>
                                    <option value="#">シニア（60才以上）1,100円</option>
                                    <option value="#">障碍者割引 1,000円</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ticket">
                        <div class="clearfix">
                            <p class="seat_num">XX</p>
                            <p class="select_ticket">
                                <select name="#">
                                    <option value="#">券種を選択して下さい。</option>
                                    <option value="#">一般 1,100円</option>
                                    <option value="#">高校生 500円</option>
                                    <option value="#">大・専 500円</option>
                                    <option value="#">中・小 500円</option>
                                    <option value="#">幼児（3才～） 500円</option>
                                    <option value="#">シニア（60才以上）1,100円</option>
                                    <option value="#">障碍者割引 1,000円</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix">
                        <p id="total">合計</p>
                        <p id="price">XXXX円</p>
                    </div>
                </div>
                <div id="drink">
                    <h2>ドリンク</h2>
                    <p>オプションでドリンクを購入することできます。映画館で受け取れて便利です。</p>
                    <div class="clearfix">
                        <div class="chk_drink"><input type="checkbox" name="#" value="">ペプシコーラ 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">ミニッツメイド 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">カルピス 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">メロンソーダ 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">C.Cレモン 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">ジンジャーエール 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">リプトン・アイスティー 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">ウーロン茶 200円</div>
                        <div class="chk_drink"><input type="checkbox" name="#" value="">白ぶどう 200円</div>
                    </div>
                </div>
                <div id="food">
                    <h2>フード</h2>
                    <p>オプションでフードを購入することできます。映画館で受け取れて便利です。</p>
                    <div class="clearfix">
                        <div class="chk_food"><input type="checkbox" name="#" value="">ポップコーン 400円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">フライドポテト300円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">鶏の唐揚げ 300円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">ホットドック 350円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">サンドウィッチ 350円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">チュリトス 300円</div>
                        <div class="chk_food"><input type="checkbox" name="#" value="">プレッツェル 200円</div>
                    </div>
                </div>
                <div id="goods">
                    <h2>goods</h2>
                    <p>オプションでグッズを購入することできます。映画館で受け取れて便利です。</p>
                    <div class="clearfix">
                        <div class="chk_goods"><input type="checkbox" name="#" value="">パンフレット 800円</div>
                        <div class="chk_goods"><input type="checkbox" name="#" value="">キーホルダー 300円</div>
                        <div class="chk_goods"><input type="checkbox" name="#" value="">ぬいぐるみ 1500円</div>
                        <div class="chk_goods"><input type="checkbox" name="#" value="">メモ帳 200円</div>
                    </div>
                </div>
                <div id="login_area">
                    <h2>ログインして購入</h2>
                    <form action="#">
                        <h3>メールアドレス</h3>
                        <input class="txt_box" type="email" name="txtMail" value="">
                        <h3>パスワード</h3>
                        <input class="txt_box" type="password" name="txtPass" value="">
                        <div id="text_align">
                            <input id="login" type="submit" name="login" value="ログイン">
                        </div>
                    </form>
                </div>
                <div id="next_area">
                    <h2>ログインしないで購入</h2>
                    <form action="user_info.php">
                        <input id="next" type="submit" name="next" value="次へ">
                    </form>
                </div>
                <div id="back_area">
                    <form action="select_seat.php">
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
                        <dt>劇場</dt>
                        <dd>〇〇〇〇</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
