<?php
include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/login_session.php');
header('Content-Type:text/html; charset=UTF-8');
$pageTitle = '座席選択 | 予約';
$ShowId = '';

if(isset($_GET['ShowId'])){
    $_SESSION['showId'] = $_GET['ShowId'];
    //劇場選択ページから来た場合は座席情報をリセット
    unset($_SESSION['seats']);
}
$ShowId = $_SESSION['showId'];

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/mysqlenv.php');

try{
    $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
    if($dbh == null){
        exit('DB接続失敗');
    }
    $dbh->query('set names utf8');
    //データ抽出
    $sql = " select * from t_theater, t_screen, t_show, t_scon, t_movie ";
    $sql .= " where t_show.show_id='".$ShowId."' ";
    $sql .= " and t_show.show_id = t_scon.show_id ";
    $sql .= " and t_show.scr_id = t_screen.scr_id ";
    $sql .= " and t_theater.the_num = t_screen.the_num ";
    $sql .= " and t_show.movie_num = t_movie.movie_num ";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
}catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}
$dbh = null;

if($count === 0){
    $errMsg .= '指定上映IDに該当する席状況データが見つかりませんでした。<br />';
    $errFlg = 'true';
}

for($i=0; $i<10; $i++){
    for($j=1; $j<21; $j++){
        if(isset($_SESSION['seats'])){
            foreach($_SESSION['seats'] as $pointer => $value){
                if($pointer == chr(65+$i).$j){
                    $result[chr(65+$i).$j] = '1';
                }
            }
        }
    }
}
$arrTicketStatus['movie_name'] = $result['movie_name'];
$arrTicketStatus['show_enter'] = date('Y-m-d H:i', strtotime($result['show_enter']));
$arrTicketStatus['show_start'] = date('Y-m-d H:i', strtotime($result['show_start']));
$arrTicketStatus['show_finish'] = date('Y-m-d H:i', strtotime($result['show_finish']));
$arrTicketStatus['the_num'] = $result['the_num'];
$arrTicketStatus['the_name'] = $result['the_name'];
$arrTicketStatus['scr_name'] = $result['scr_name'];
$arrTicketStatus['scr_seat'] = $result['scr_seat'];
$_SESSION['ticket_status'] = $arrTicketStatus;
?>

<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/head.php'); ?>
<body class="select_seat">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/halcinema/user/ticket/header.php'); ?>
    <div id="contents">
        <div id="left">
            <h2>お好きな座席をお選びください。</h2>
            <div id="icon_des">
                <h2>アイコン説明</h2>
                <ul>
                    <li><img src="images/seat_0.gif" width="15" height="22" alt="空席（購入可能）">空席（購入可能）</li>
                    <li><img src="images/seat_1.gif" width="15" height="22" alt="選択した席">選択した席</li>
                    <li><img src="images/seat_2.gif" width="15" height="22" alt="購入済み／販売対象外">購入済み／販売対象外</li>
                </ul>
            </div>
            <form class="select_seat_form" action="javascript:void(0);" method="post">
            <h3><?= $_SESSION['ticket_status']['scr_name'] ?></h3>
            <div id="select_seat_area_out">
                <div id="select_seat_area_in">
                    <table>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <?php for($i=0; $i<18; $i++): ?>
                            <th></th>
                            <?php endfor; ?>
                            <th>20</th>
                        </tr>
                        <?php for($i=0; $i<10; $i++){ ?>
                        <tr>
                            <th><?= chr(65+$i) ?></th>
                            <?php for($j=1; $j<21; $j++){ ?>
                            <td>
                                <?php if($result[chr(65+$i).$j] == '0' || $result[chr(65+$i).$j] == '1'): ?>
                                    <label for="<?= chr(65+$i).$j ?>">
                                    <input id="<?= chr(65+$i).$j ?>" type="checkbox" name="selected[]" value="<?= chr(65+$i).$j ?>"
                                    <?php if($result[chr(65+$i).$j] == "1"): ?>
                                         checked="checked"
                                     <?php endif; ?>
                                     />
                                <?php endif; ?>
                                <?php
                                    //alt属性値分岐
                                    if($result[chr(65+$i).$j] == '0'){
                                        $altText = '空席（購入可能）';
                                    }else if($result[chr(65+$i).$j] == '1'){
                                        $altText = '選択した席';
                                    }else if($result[chr(65+$i).$j] == '2'){
                                        $altText = '購入済み／販売対象外';
                                    }
                                ?>
                                <img id="img<?= chr(65+$i).$j ?>" src="images/seat_<?= $result[chr(65+$i).$j] ?>.gif" width="15" height="22" alt="<?= $altText ?>"
                                <?php if($result[chr(65+$i).$j] == '0'): ?>
                                        onClick="fnc_select('<?= chr(65+$i).$j ?>')"
                                <?php elseif($result[chr(65+$i).$j] == '1'): ?>
                                        onClick="fnc_release('<?= chr(65+$i).$j ?>')"
                                <?php endif; ?>
                                />
                                <?php if($result[chr(65+$i).$j] == "0"){ ?>
                                </label>
                                <?php } ?>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div id="fac">
                <h2>映画館の設備</h2>
                <table border="1">
                    <tr width="700"><th width="500">座席数</th><th width="200">設備・音響</th></tr>
                    <tr><td><?= $_SESSION['ticket_status']['scr_seat'] ?></td><td>〇〇〇〇</td></tr>
                </table>
            </div>
            <div id="terms">
                <h2>利用規約</h2>
                <iframe src="terms.html" width="700" height="200"></iframe>
            </div>
                <input type="hidden" name="the_num" value="<?= $_SESSION['ticket_status']['the_num'] ?>">
                <input id="next" class="ticket-form__submit ticket-form__submit--blue go_select_ticket" type="submit" name="next" value="利用規約に同意して次へ" />
                <input id="back" class="transition_cinema_schedule" type="submit" name="back" value="時間指定画面へ戻る" />
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
    </div><!-- /#contents -->
    <footer class="ticket_footer">
        <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
    </footer>
</body>
</html>
