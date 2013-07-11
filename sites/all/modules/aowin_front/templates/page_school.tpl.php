<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="content_wrapper">
    <br>
    <div class="school-basic-info">
        <br>
        <div class="school-avatar">
            <img width="100" alt="<?php print $school->field_school_logo['und'][0]['value']; ?>" src="<?php print $school->logo ?>">
        </div>
        <div class="school-info">
            <strong><?php print $school->title; ?></strong><br>
            <?php print $school->field_school_brief_introduction['und'][0]['value']; ?>
        </div>
    </div>
    <div class="school-introdution">
        <br>
        <h3><strong>详细介绍：</strong></h3>
        <br>
        <?php print $school->body['und'][0]['value']; ?>
    </div>
</div>
