<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<div class="content-info">
    <div class="material-info">
        <div class="content-title">
            <h1 align="center"><?php print $material->title ?></h1>
        </div>
        <div class="content-date">
            发布日期：<?php print date('Y-m-d', $material->changed); ?>
        </div>
        <div class="content">
            <?php print $material->body['und'][0]['value']; ?>
        </div>
    </div>
</div>
