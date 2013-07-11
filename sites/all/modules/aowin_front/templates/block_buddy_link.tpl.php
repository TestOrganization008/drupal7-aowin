<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-7-1">友情链接</div>
<div class="center-7-2">
    <?php foreach ($buddy_links as $key => $buddy_link): ?>
        <span><a href="<?php print $buddy_link->title; ?>"><?php print $buddy_link->field_buddy_link_name['und'][0]['value']; ?></a></span>
    <?php endforeach; ?>
</div>