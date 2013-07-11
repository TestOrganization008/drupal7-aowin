<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!--<div class="center-6-5-1">实训项目<a class="show-more" href="<?php print base_path() . 'projects'; ?>" class="a-more">[更多]</a></div>-->
<div class="center-6-5-2">
    <ul class="ul-jyxx">
        <?php foreach ($projects as $key => $project): ?>
            <li><a href="<?php print base_path() . 'projects/' . $project->nid; ?>"><?php print $project->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <a class="show-more" href="<?php print base_path() . 'projects'; ?>" class="a-more">[更多]</a>
</div>