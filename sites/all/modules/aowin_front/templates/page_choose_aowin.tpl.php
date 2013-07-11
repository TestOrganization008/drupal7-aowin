<!--
To change this template, choose Tools | Templates
and open the template in the editor.

-->
<div class="content_wrapper">
    <div class="current-position-div">
        当前所在位置：
        <div class="breadcrumb">
            <a href="<?php print base_path() . 'about'; ?>">选择和盈</a> › <a class="active" href="<?php print base_path() . 'choose_aowin'; ?>">选择理由</a>
        </div>
    </div>
    <div style="text-align: center;">
        <h1>选择和盈的理由</h1>
    </div>
    <div class="resons-list reson-list-title">
        <ul class="tabs ul-choose-aowin">
            <?php foreach ($resons as $key => $reson): ?>
                <li class="item-list reson-list">
                    <a rel="<?php print $key; ?>" class="<?php if ($key == 0): ?>active<?php endif; ?>" href="javascript:"><?php print $reson->title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="reson-content-list">
        <?php foreach ($resons as $key => $reson): ?>
            <div id="reson-content-item-<?php print $key; ?>" class="reson-content-item" style="display: <?php if ($key == 0): ?>block<?php else: ?>none<?php endif; ?>">
                <?php print $reson->body['und'][0]['value']; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    jQuery(document).ready(function (){
        jQuery(".ul-choose-aowin li a").each(function (){
            jQuery(this).click(function (){
                jQuery(".ul-choose-aowin li a").removeClass("active");
                jQuery(this).addClass("active");
                jQuery(".reson-content-item").hide();
                jQuery("#reson-content-item-" + jQuery(this).attr("rel")).show();
            });
        });
    });
</script>
