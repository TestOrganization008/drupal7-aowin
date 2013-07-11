<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-4-1">就业之星</div>
<div class="center-4-2">
    <?php foreach ($star_students as $key => $student): ?>
        <div class="center-4-2-1">
            <div class="center-4-2-1-1">
                <img src="<?php print $student->picture; ?>" style="width:120px;height:100px;">
            </div>
            <div class="center-4-2-1-2">
                <?php print $student->name; ?>【<?php print $student->company; ?>】
            </div>
        </div>
    <?php endforeach; ?>
</div>