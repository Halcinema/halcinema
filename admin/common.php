<header class="admin_header">
    <h1 class="admin_header_ttl">HALシネマ管理</h1>
    <ul class="admin_header_list">
        <li class="admin_header_list_item admin_header_list_item_ttl"><?php print $pageTitle; ?></li>
        <li class="admin_header_list_item">所属：<?php print $AdminTheName; ?></li>
        <li class="admin_header_list_item">管理者：<?php print $AdminName; ?></li>
        <li class="admin_header_list_item" onClick="fnc_logout();"><a href="/halcinema/admin/account/logout/index.php">ログアウト</a></li>
    </ul>
</header>
<nav class="admin_gnav">
    <ul class="admin_gnav_list">
        <li class="admin_gnav_list_item"><a href="/halcinema/admin/index.php"><i class="fa fa-tachometer" aria-hidden="true"></i>ダッシュボード</a></li>
        <li class="admin_gnav_list_item"><a href="/halcinema/admin/add_movie.php"><i class="fa fa-film" aria-hidden="true"></i>映画管理</a></li>
        <li class="admin_gnav_list_item"><a href="/halcinema/admin/add_show_schedule.php"><i class="fa fa-list" aria-hidden="true"></i>上映管理</a></li>
    </ul>
</nav>
