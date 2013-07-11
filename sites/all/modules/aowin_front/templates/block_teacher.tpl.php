<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!--<div class="center-1-1-1">专业师资<a class="show-more" href="<?php print base_path() . 'teachers'; ?>" class="a-more">[更多]</a></div>-->
<div class="center-1-1-2">
    <ul class="ul-jyxx">
        <?php foreach ($teachers as $key => $teacher): ?>
            <li><a href="<?php print base_path() . 'teachers/' . $teacher->nid ?>"><?php print $teacher->field_teacher_name['und'][0]['value']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <a class="show-more" href="<?php print base_path() . 'teachers'; ?>" class="a-more">[更多]</a>
</div>