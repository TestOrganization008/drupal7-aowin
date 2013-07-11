<?php include dirname(__FILE__) . '/../header.php'; ?>
<div id="wrapper">
    <div id="container" class="clearfix">
        <div id="center" class="center">
            <div class="content_wrapper">
                <div class="current-position-div">当前所在位置：<?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?></div>
                <div class="content_left">
                    <?php print render($page['content']); ?>
                </div>
                <div class="content_right">
                    <?php include dirname(__FILE__) . '/../righter.php'; ?>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div> <!-- /#container -->
</div> <!-- /#wrapper -->
<?php include dirname(__FILE__) . '/../footer.php'; ?>