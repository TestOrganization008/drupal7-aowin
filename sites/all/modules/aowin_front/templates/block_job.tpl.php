<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-1-1-1">最新学员就业喜报 <a class="show-more" href="<?php print base_path() . 'jobs'; ?>" class="a-more">[更多]</a></div>
<div class="center-1-1-2">
    <ul class="ul-jyxx">
        <?php foreach ($jobs as $key => $job): ?>
            <li class="item-list job-list">
                <a href="<?php print base_path() . 'jobs/' . $job->id; ?>"><?php print $job->date . $job->name; ?>就业薪资<?php print $job->salary; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>