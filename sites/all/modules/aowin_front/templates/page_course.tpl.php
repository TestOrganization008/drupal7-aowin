<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="content_wrapper">
    <div class="course_info">
        <h1 align="center"><?php print $course->title; ?></h1><br>
        <div class="course_info_header tabs">
            <ul class="tabs">
                <li><a name="course_info_goal" class="course_info_control active"><span class="tab">课程目标</span></a></li>
                <li><a name="course_info_env" class="course_info_control"><span class="tab">教学环境</span></a></li>
                <li><a name="course_info_company" class="course_info_control"><span class="tab">就业企业</span></a></li>
                <li><a name="course_info_certification" class="course_info_control"><span class="tab">权威证书</span></a></li>
                <li><a name="course_info_book" class="course_info_control"><span class="tab">教学教材</span></a></li>
            </ul>
        </div>
        <div class="course_info_div">
            <div id="course_info_goal">
                <?php print $course->field_goal['und'][0]['value']; ?>
            </div>
        </div>

        <div class="course_info_div" style="display: none">
            <div id="course_info_env">
                <?php print $course->field_course_env['und'][0]['value']; ?>
            </div>
        </div>
        <div class="course_info_div" style="display: none">
            <div id="course_info_company">
                <?php print $course->field_course_job['und'][0]['value']; ?>
            </div>
        </div>
        <div class="course_info_div" style="display: none">
            <div id="course_info_certification">
                <?php print $course->field_course_certification['und'][0]['value']; ?>
            </div>
        </div>
        <div class="course_info_div" style="display: none">
            <div id="course_info_book">
                <?php print $course->field_course_book['und'][0]['value']; ?>
            </div>
        </div>
    </div>
    <div class="course_detail">
        <?php print $course->body['und'][0]['value']; ?>
    </div>
</div>
