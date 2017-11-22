<?php include ("login_session.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/ticket.css" rel="stylesheet" type="text/css" />
<link href="css/sub_common.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<title>チケット情報</title>
</head>

<body>
<?php include("header.php"); ?>
        <div id="wrapper" style="line-height: 30px;">
    <ul style="display: flex;">
<a href="service.php" class="service_button"><li>サービス案内>></li></a><a href="ticket.php" class="service_button" id="now"><li>チケット案内>></li></a><a href="access.php" class="service_button"><li>アクセス方法・駐車場情報>></li></a>
	</ul>
<h1 class="page_name">チケット案内</h1>
<section class="clearfix">
    
    <ul id="ticket_box">
        <li>
        <div id="ticket_info">
        <img src="images/ticketbox.jpg">
        <h4 class="info_name">チケットボックス</h4>
        <p>チケットボックスはエントランスからロビーに入った正面にあります。モニターに映し出された上映時間、空席状況を確認いただきチケットをご購入ください。
            また、インターネットチケットをご購入済みの方はロビーに入って右側にあります自動発券機にて発券ください。
        </p>
            </div>
        </li>
    </ul>
    
<h2 class="contents_name" id="service-mokuji">目次</h2>
    
        <ul class="page_link">
            <a href="#ticket-oshirase"><li>お知らせ</li></a>
            <a href="#ticket-ryokin"><li>料金の情報</li></a>
        </ul>
    
<h2 class="contents_name" id="ticket-oshirase">お知らせ</h2>
  <div class="sale_info" style="padding-bottom:85px">
    <p style="width:650px;float:left">チケットとグッズをセットで買うと割引！<br>
    チケットとグッズをセットで購入すると料金が割引されます。</p>
      <img src="images/set_price.png" style="float:right" height="75px">
  </div>
  <div class="sale_info" style="padding-bottom:85px">
    <p style="width:650px;float:left">3D、4DX、DOLBYでの観賞は各々で追加料金を頂いております。<br>
    4DXについて詳しくは<a href="4dx.php">こちら</a></p>
      <img src="images/4dx.png" style="float:right;" height="75px">
  </div>
  <div class="sale_info" style="padding-bottom:85px">
    <p style="width:650px;float:left">3D映画視聴後、3D眼鏡はお持ち帰りいただけます。<br>3D眼鏡をお持ち込みいただくと、メガネの料金100円が割引されます。</p>
      <img src="images/glasses.jpg" style="float:right;" height="75px"><p></p>
  </div>
<h2 class="contents_name" id="ticket-ryokin">料金の情報</h2>
<div id="ticket_box_back">
  <div class="ticket_box  clearfix">
    <div class="ticket_left">基本入場料金</div>
    <div class="ticket_right">
      <table>
        <tr>
          <td class="m">一般</td>
          <td class="a"></td>
          <td class="y">1,800円</td>
        </tr>
        <tr>
          <td class="m">大学生</td>
          <td class="a">※学生証をご提示ください。</td>
          <td class="y">1,500円</td>
        </tr>
        <tr>
          <td class="m">高校生</td>
          <td class="a">※学生証をご提示ください。</td>
          <td class="y">1,000円</td>
        </tr>
        <tr>
          <td class="m">中学生</td>
          <td class="a"></td>
          <td class="y">1,000円</td>
        </tr>
        <tr>
          <td class="m">小学生</td>
          <td class="a"></td>
          <td class="y">1,000円</td>
        </tr>
        <tr>
          <td class="m">幼児 （3才～）</td>
          <td class="a">※作品により2才以上になることがあります。<br>
            ※3歳未満のお子様はひざの上にお載せになってご鑑賞ください。イスに着席させる場合には、幼児料金をいただきますのでご了承ください。</td>
          <td class="y">1,000円</td>
        </tr>
        <tr>
          <td class="m">障がい者手帳をお持ちのご本人様</td>
          <td class="a">※お付き添いの方1名まで同料金</td>
          <td class="y">1,000円</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="ticket_box clearfix">
    <div class="ticket_left">スペシャル</div>
    <div class="ticket_right">
      <table>
        <tr>
          <td class="m">ファーストデイ <br>
            （毎月1日）</td>
          <td class="a"></td>
          <td class="y">1,100円</td>
        </tr>
        <tr>
          <td class="m">レディースデイ</td>
          <td class="a">（毎週木曜日・女性のみ）</td>
          <td class="y">1,100円</td>
        </tr>
        <tr>
          <td class="m">レイトショー</td>
          <td class="a">（20時以降上映回）<br>
            ※23時以降終映の回は保護者同伴であっても18歳未満のお客様はご入場いただけません。</td>
          <td class="y">1,300円</td>
        </tr>
        <tr>
          <td class="m">シニア （60歳以上の方）</td>
          <td class="a"> </td>
          <td class="y">1,100円</td>
        </tr>
        <tr>
          <td class="m">夫婦50割引</td>
          <td class="a">※どちらかが50歳以上のご夫婦お二人で、<br>
            同一日時・同作品をご鑑賞の場合<br>
            ※年齢の確認できるものをご提示ください。
            （お二人）</td>
          <td class="y">2,200円</td>
        </tr>
      </table>
      <p>※スペシャルプライスは他の割引サービスとの併用は出来ません<br>
        ※特別興行の作品には適用されません。</p>
    </div>
  </div>
  <div class="ticket_box clearfix">
    <div class="ticket_left">3D入場料金</div>
    <div class="ticket_right">
      <table>
        「基本入場料金」＋400円（3D料金300円＋メガネ代100円）
        <ul class="ticket_list">
          <li>※各種スペシャル料金にも＋400円でご鑑賞いただけます。</li>
          <li>※前売券・各種引換券・無料券（株主優待券、招待券）も1枚につき＋400円でご鑑賞いただけます。</li>
          <li>※劇場でお渡しした（ご購入いただいた）3Dメガネはお持ち帰りいただけます。</li>
          <li>※3Dメガネを持参された場合、メガネ代を100円割引致します。</li>
        </ul>
      </table>
    </div>
  </div>
  <div class="ticket_box clearfix">
    <div class="ticket_left">4DX入場料金</div>
    <div class="ticket_right">
      <table>
        「基本入場料金」＋1000円
        <ul class="ticket_list">
        </ul>
      </table>
    </div>
  </div>
  <div class="ticket_box clearfix">
    <div class="ticket_left">DOLBY</div>
    <div class="ticket_right">
      <table>
        作品鑑賞料金
        入場料金 ＋ 200円
      </table>
    </div>
  </div>
  <div class="ticket_box clearfix">
    <div class="ticket_left">シート</div>
    <div class="ticket_right">
      <table>
        利用料金
        入場料金 ＋ 1,000円
      </table>
    </div>
  </div>
</div>
</section>
    </div>
    <footer></footer>

</body>
</html>