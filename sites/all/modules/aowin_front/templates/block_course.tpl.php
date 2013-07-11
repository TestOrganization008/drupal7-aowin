<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!--<div class="center-1-3-1">课程体系</div>-->
<div class="center-1-3-2">
    <ul class="ul-kbtx">
        <?php foreach ($courses as $key => $course): ?>
            <li>
                <a href="<?php print base_path() . 'courses/' . $course->nid; ?>"><?php print $course->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div><a class="show-more" href="<?php print base_path() . 'courses'; ?>" class="a-more">[更多]</a></div>
