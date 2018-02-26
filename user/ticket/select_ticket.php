<?php
include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/login_session.php');
header('Content-Type:text/html; charset=UTF-8');
$pageTitle = 'チケット選択 | 予約';
$loginErrMsg = '';

if(isset($_GET['loginErr'])){
    $loginErr = $_GET['loginErr'];
    if($loginErr == '1'){
        $loginErrMsg = '組み合わせが誤っています';
    }else if($loginErr == '2'){
        $loginErrMsg = '入力されたメールアドレスは登録されていません';
    }
}
$loginerrMsg = '';

if(isset($_POST['selected'])){
    $selected = $_POST['selected'];
    foreach($selected as $seats){
        //席記号を添え字にチケット初期値0を格納
        $array[$seats] = '0';
    }
    //セッションをリセットしてから再格納
    unset($_SESSION['seats']);
    $_SESSION['seats'] = $array;
}

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/mysqlenv.php');

try{
    $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
    if($dbh == null){
        exit('DB接続失敗');
    }
    $dbh->query('set names utf8');
    //チケット情報読み込み
    $sql = " select * from t_ticket ";
    $stmt = $dbh->query($sql);
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $result;
    }
    $count = $stmt->rowCount();
}catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}
$dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="select_ticket">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/ticket/header.php'); ?>
    <div id="contents">
        <div id="left">
            <h2 class="select_ticket_ttl">チケットの種類をお選びください。</h2>
            <p id="attention">今から15分以内に購入が完了しない場合、自動的に座席は解除されます。</p>
            <form id="next_form" method="post" action="session_input.php">
            <div class="select_ticket_area">
                <h2><?= $_SESSION['ticket_status']['scr_name'] ?></h2>
                <?php foreach($_SESSION['seats'] as $pointer => $value): ?>
                    <div class="ticket">
                        <p class="seat_num"><?= $pointer ?></p>
                        <p class="select_ticket">
                            <select class="select_ticket_list" name="selected[<?= $pointer ?>]">
                                <option value="0" <?php //if($value == "0"){ print "selected='selected'"; }?>>券種を選択して下さい。</option>
                                <?php for($i=0; $i<7; $i++): ?>
                                <?php
                                    $selected = '';
                                    if($value === $rows[$i]['ticket_num']){
                                        $selected = 'selected="selected"';
                                    }
                                ?>
                                <option value="<?= $rows[$i]['ticket_num'] ?>" <?= $selected ?>><?= $rows[$i]['ticket_name'] ?></option>
                                <?php endfor; ?>
                            </select>
                        </p>
                    </div>
                <?php endforeach; ?>
                <div class="price">
                    <p class="ttl">合計</p>
                    <p class="disp">0円</p>
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
            <div id="login_area">
                <h2>ログインして購入</h2>
                    <?php if($MemMail == ''): ?>
                        <?php if($loginErrMsg != ''){
                            echo $loginErrMsg;
                        } ?>
                    <input class="ticket-form__text" type="email" name="txtMail" value="" placeholder="メールアドレス" required>
                    <input class="ticket-form__text" type="password" name="txtPass" value="" placeholder="パスワード" required>
                    <div id="text_align">
                        <input class="ticket-form__submit ticket-form__submit--blue" type="submit" name="login" value="ログイン">
                    </div>
                    <?php else: ?>
                    <h3><?= $MemName ?>さん、既にログインされています。</h3>
                    <h3>このアカウントで購入する。</h3>
                    <div id="text_align">
                        <input class="ticket-form__submit ticket-form__submit--blue" type="submit" name="loginBuy" value="次へ">
                    </div>
                    <h3>このアカウントでは購入しない。</h3>
                    <div id="text_align">
                        <input class="ticket-form__submit ticket-form__submit--blue" type="submit" name="logout" value="ログアウト">
                    </div>
                    <?php endif; ?>
            </div>
            <?php if($MemMail == ""){ ?>
            <div id="next_area">
                <h2>ログインしないで購入</h2>
                    <p><input class="ticket-form__submit ticket-form__submit--blue" type="submit" name="noLoginBuy" value="次へ"></p>
            </div>
            <?php } ?>
            <input type="hidden" name="the_num" value="<?php print $_SESSION["ticket_status"]["the_num"]; ?>">
            <div class="btn">
                <input id="back" class="transition_select_seat" type="submit" name="back" value="戻る">
            </div>
            <div class="btn">
                <input id="all_back" class="transition_cinema_schedule" type="submit" name="all_back" value="購入を取り消して時間指定画面へ戻る">
            </div>
            </form>
        </div>
        <div class="right">
            <div class="ticket_status">
                <h2>ご購入内容</h2>
                <dl>
                    <dt>作品</dt>
                    <dd><?= $_SESSION['ticket_status']['movie_name'] ?></dd>
                    <dt>入場可能日時</dt>
                    <dd><?= $_SESSION['ticket_status']['show_enter'] ?></dd>
                    <dt>上映開始日時</dt>
                    <dd><?= $_SESSION['ticket_status']['show_start'] ?></dd>
                    <dt>上映終了日時</dt>
                    <dd><?= $_SESSION['ticket_status']['show_finish'] ?></dd>
                    <dt>劇場</dt>
                    <dd><?= $_SESSION['ticket_status']['the_name'] ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <footer class="ticket_footer">
        <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
    </footer>
</body>
</html>
