<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
?>
<div>
    <h2><span><strong>就业特写</strong></span></h2>
    <div class="student-basic-info">
        <div class="student-avatar">
            <img width="100" alt="<?php print $job->name . '头像'; ?>" src="<?php print $job->picture; ?>">
        </div>
        <div class="student-info">
            <label>学员姓名：</label><?php print $job->name; ?><br>
            <label>毕业学校：</label><?php print $job->school; ?><br>
            <label>专业：</label><?php print $job->marjor; ?><br>
            <label>学历：</label><?php print show_degree($job->degree); ?><br>
            <label>培训前情况：</label><?php print $job->experience; ?>
        </div>
    </div>
    <br>
    <h2><span><strong>培训心得</strong></span></h2>
    <div class="student-story">
        <?php print $job->feeling; ?>
    </div>
</div>
