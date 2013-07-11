<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
?>
<div class="content-info">
    <div class="news-info">
        <div class="content-title">
            <h1 align="center"><?php print $new->title ?></h1>
        </div>
        <div class="content-date">
            发布日期：<?php print date('Y-m-d', $new->changed); ?>
        </div>
        <div class="content">
            <?php print $new->body['und'][0]['value']; ?>
        </div>
    </div>
</div>
