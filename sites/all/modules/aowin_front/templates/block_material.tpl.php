<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-6-5-1">学习资料<a class="show-more" href="<?php print base_path() . 'materials'; ?>" class="a-more">[更多]</a></div>
<div class="center-6-5-2">
    <ul class="ul-jyxx">
        <?php foreach ($materials as $key => $material): ?>
            <li class="item-list item-material" ><a href="<?php print base_path() . 'materials/' . $material->nid; ?>"><?php print $material->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>