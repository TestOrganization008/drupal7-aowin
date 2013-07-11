<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-5-1-1">和盈动态<a class="show-more" href="<?php print base_path() . 'news'; ?>" class="a-more">[更多]</a></div>
<div class="center-5-1-2">
    <ul class="ul-jyxx">
        <?php foreach ($news as $key => $new): ?>
            <li><a href="<?php print base_path() . 'news/' . $new->nid; ?>"><?php print $new->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>