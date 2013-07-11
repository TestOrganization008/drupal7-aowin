<?php
global $user;
$datetime = getdate();
$hour = $datetime['hours'];
$welcome = '';
if ($hour >= 0 && $hour < 12) {
    $welcome = '早上好！';
} else if ($hour == 12) {
    $welcome = '中午好！';
} else if ($hour >= 13 && $hour < 18) {
    $welcome = '下午好！';
} else {
    $welcome = '晚上好！';
}
?>
<div class="header">
    <?php if ($breadcrumb): ?>
        <label class="current-position">当前您所在的位置：</label>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
    <div id="welcome-login-logout-control">
        <?php if ($user->uid): ?>
            <div class="welcome-control">
                <span><?php print $welcome . ' ' . $user->name; ?></span>
            </div>
            <div class="login-logout-control">
                <span ><a href="<?php print base_path() . 'logout'; ?>">退出</a></span>
            </div>
        <?php else: ?>
            <div class="welcome-control">
                <span><?php print $welcome . ' ' . '您尚未登陆请'; ?></span>
            </div>
            <div class="login-logout-control">
                <span><a href="<?php print base_path() . 'login'; ?>">登陆</a></span>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="wrapper">
    <div id="container" class="clearfix">
        <div id="center">
            <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
                <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
            <a id="main-content"></a>
            <div class="main-content">
                <?php if ($messages): ?>
                    <div id="console" class="clearfix"><?php print $messages; ?></div>
                <?php endif; ?>
                <?php print render($page['content']); ?>
            </div>
        </div>
    </div> <!-- /#container -->
</div> <!-- /#wrapper -->