<header class="ticket_header">
    <div class="ticket_header_top">
        <h1 class="ticket_header_top_ttl">halcinema / オンライン予約</h1>
        <?php if($MemMail != ""): ?>
        <p class="ticket_header_top_user"><?php print $MemName; ?>さんでログイン中</p>
        <?php endif; ?>
    </div>
    <p class="ticket_header_breadcrumbs">
        <span class="ticket_header_breadcrumbs_list ticket_header_breadcrumbs_list1">座席・チケット選択</span>
        <span >&gt;</span>
        <span class="ticket_header_breadcrumbs_list ticket_header_breadcrumbs_list2">ご購入者情報の入力</span>
        <span>&gt;</span>
        <span class="ticket_header_breadcrumbs_list ticket_header_breadcrumbs_list3">お支払情報の入力</span>
        <span>&gt;</span>
        <span class="ticket_header_breadcrumbs_list ticket_header_breadcrumbs_list4">購入内容の確認</span>
        <span>&gt;</span>
        <span class="ticket_header_breadcrumbs_list ticket_header_breadcrumbs_list5">購入完了</span>
    </p>
</header>
