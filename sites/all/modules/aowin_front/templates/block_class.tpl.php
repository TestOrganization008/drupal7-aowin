<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-1-3-1">最新开班公告</div>
<div class="center-1-3-2">
    <ul class="ul-kbxx">
        <?php foreach ($train_classes as $key => $class): ?>
        <li><a href="<?php print base_path() . 'classes/' . $class->nid; ?>"><?php print $class->title; ?></a>
                <br />
                时间：<?php print date('m月d日', $class->field_class_start['und'][0]['value']); ?> 
                <!--<a class="a-kbxx" target="_blank" href="<?php // print base_path() . 'get_register_form'; ?>">索取报名表</a>-->
            </li>
        <?php endforeach; ?>
    </ul>
</div>
