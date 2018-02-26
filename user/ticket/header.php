<header class="ticket-header">
    <div class="ticket-header-top">
        <h1 class="ticket-header-top__ttl">halcinema / オンライン予約</h1>
        <?php if($MemMail != ''): ?>
        <p class="ticket-header-top__user"><?= $MemName ?>さんでログイン中</p>
        <?php endif; ?>
    </div>
    <ul class="ticket-header-breadcrumbs">
        <li class="ticket-header-breadcrumbs__item">
            <span class="ticket-header-breadcrumbs__text ticket-header-breadcrumbs__text1">座席・チケット選択</span>
        </li>
        <li class="ticket-header-breadcrumbs__item">
            <span class="ticket-header-breadcrumbs__text ticket-header-breadcrumbs__text2">ご購入者情報の入力</span>
        </li>
        <li class="ticket-header-breadcrumbs__item">
            <span class="ticket-header-breadcrumbs__text ticket-header-breadcrumbs__text3">お支払情報の入力</span>
        </li>
        <li class="ticket-header-breadcrumbs__item">
            <span class="ticket-header-breadcrumbs__text ticket-header-breadcrumbs__text4">購入内容の確認</span>
        </li>
        <li class="ticket-header-breadcrumbs__item">
            <span class="ticket-header-breadcrumbs__text ticket-header-breadcrumbs__text5">購入完了</span>
        </li>
    </ul>
</header>
