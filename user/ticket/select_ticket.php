<?php include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "チケット選択 | 予約";

//エラーフラグ（初期値：エラー無し）
$errFlg = "false";

//エラーメッセージ
$errMsg = "";

if(isset($_POST["selected"])){
    $selected = $_POST["selected"];
    foreach($selected as $seats){
        //席記号を添え字にチケット初期値0を格納
        $array[$seats] = "0";
    }
    //セッションをリセットしてから再格納
    unset($_SESSION["seats"]);
    $_SESSION["seats"] = $array;
}

//チケット情報読み込み

include("../mysqlenv.php");

//  MySQLとの接続開始
if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー<br />" . mysqli_connect_error());
}

//  クエリー送信(文字コード)
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" . $SQL);
}

//  MySQLデータベース選択
if(!mysqli_select_db($Link,$DB)){
  //  MySQLデータベース選択失敗
  exit("MySQLデータベース選択エラー<br />" . $DB);
}

//  クエリー送信(選択クエリー)
$SQL = "select * from t_ticket";
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" . $SQL);
}

//  連想配列への抜出（先頭行）
$Row = mysqli_fetch_array($SqlRes);

//  抜き出されたレコード件数を求める
$NumRow = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

?>

<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="select_ticket">
    <div id="wrapper">
        <header class="ticket_header">
            <h1 class="ticket_header_ttl">halcinema / オンライン予約</h1>
            <p class="ticket_header_breadcrumbs">
                <span class="ticket_header_breadcrumbs_now" class="ticket_header_breadcrumbs_padding">座席・チケット選択</span>
                <span>&gt;</span>
                <span class="ticket_header_breadcrumbs_padding">ご購入者情報の入力</span>
                <span>&gt;</span>
                <span class="ticket_header_breadcrumbs_padding">お支払情報の入力</span>
                <span>&gt;</span>
                <span class="ticket_header_breadcrumbs_padding">購入内容の確認</span>
                <span>&gt;</span>
                <span class="ticket_header_breadcrumbs_padding">購入完了</span>
            </p>
        </header>
        <div id="contents">
            <div id="left">
                <h2 class="select_ticket_ttl">チケットの種類をお選びください。</h2>
                <p id="attention">今から15分以内に購入が完了しない場合、自動的に座席は解除されます。</p>
                <form id="next_form" method="post" action="session_input.php">
                <div class="select_ticket_area">
                    <h2>スクリーン名</h2>
                    <?php foreach($_SESSION["seats"] as $pointer => $value): ?>
                        <div class="ticket">
                            <p class="seat_num"><?php print $pointer ?></p>
                            <p class="select_ticket">
                                <select name="selected[<?php print $pointer ?>]">
                                    <option value="0" <?php if($value == "0"){ print "selected='selected'"; }?>>券種を選択して下さい。</option>
                                    <option value="1" <?php if($value == "1"){ print "selected='selected'"; }?>>一般 1,100円</option>
                                    <option value="2" <?php if($value == "2"){ print "selected='selected'"; }?>>高校生 500円</option>
                                    <option value="3" <?php if($value == "3"){ print "selected='selected'"; }?>>大・専 500円</option>
                                    <option value="4" <?php if($value == "4"){ print "selected='selected'"; }?>>中・小 500円</option>
                                    <option value="5" <?php if($value == "5"){ print "selected='selected'"; }?>>幼児（3才～） 500円</option>
                                    <option value="6" <?php if($value == "6"){ print "selected='selected'"; }?>>シニア（60才以上）1,100円</option>
                                    <option value="7" <?php if($value == "7"){ print "selected='selected'"; }?>>障碍者割引 1,000円</option>
                                </select>
                            </p>
                        </div>
                    <?php endforeach; ?>
                    <div class="price">
                        <p class="ttl">合計</p>
                        <p class="disp">XXXX円</p>
                    </div>
                </div>
                <div class="opt">
                    <h2 class="opt_ttl">オプションをお選びください。</h2>
                    <p class="opt_des">オプションを購入することできます。映画館で受け取れて便利です。</p>
                    <section class="opt_group">
                        <h3 class="opt_group_ttl">ドリンク</h3>
                        <ul class="opt_group_list">
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="d1">ペプシコーラ 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="d2">ミニッツメイド 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">カルピス 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">メロンソーダ 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">C.Cレモン 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">ジンジャーエール 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">リプトン・アイスティー 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">ウーロン茶 200円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="drink[]" value="">白ぶどう 200円</li>
                        </ul>
                    </section>
                    <section class="opt_group">
                        <h3 class="opt_group_ttl">フード</h3>
                        <ul class="opt_group_list">
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">ポップコーン 400円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">フライドポテト300円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">鶏の唐揚げ 300円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">ホットドック 350円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">サンドウィッチ 350円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">チュリトス 300円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="food[]" value="">プレッツェル 200円</li>
                        </ul>
                    </section>
                    <section class="opt_group">
                        <h3 class="opt_group_ttl">グッズ</h3>
                        <ul class="opt_group_list">
                            <li class="opt_group_list_item"><input type="checkbox" name="goods[]" value="">パンフレット 800円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="goods[]" value="">キーホルダー 300円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="goods[]" value="">ぬいぐるみ 1500円</li>
                            <li class="opt_group_list_item"><input type="checkbox" name="goods[]" value="">メモ帳 200円</li>
                        </ul>
                    </section>
                </div>
                <input type="hidden" name="ShowId" value="<?php $ShowId ?>">
                <input id="status" type="hidden" name="status" value="">
                <div id="login_area">
                    <h2>ログインして購入</h2>
                        <?php if($MemMail == ""){ ?>
                        <h3>メールアドレス</h3>
                        <input class="txt_box" type="email" name="txtMail" value="">
                        <h3>パスワード</h3>
                        <input class="txt_box" type="password" name="txtPass" value="">
                        <div id="text_align">
                            <input id="login" type="submit" name="login" value="ログイン" onClick="fnc_login();">
                        </div>
                        <?php }else{ ?>
                        <h3><?php print $MemName; ?>さん、すでにログインされています。</h3>
                        <h3>このアカウントで購入する。</h3>
                        <div id="text_align">
                            <input id="login" type="submit" name="logout" value="次へ" onClick="fnc_logout();">
                        </div>
                        <h3>このアカウントでは購入しない。</h3>
                        <div id="text_align">
                            <input id="login" type="submit" name="logout" value="ログアウト" onClick="fnc_logout();">
                  </div>
                  <?php } ?>
                </div>
                <?php if($MemMail == ""){ ?>
                <div id="next_area">
                    <h2>ログインしないで購入</h2>
                        <p><input id="next" type="submit" name="next" value="次へ" onClick="fnc_session(<?php print $cnt ?>);"></p>
                </div>
                <?php } ?>
                </form>
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
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div>
</body>
</html>
