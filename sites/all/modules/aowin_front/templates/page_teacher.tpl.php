<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
$default_avatar = get_default_avatar('teacher');
$teacher_avatar_uri = !empty($teacher->field_teacher_avatar) && $teacher->field_teacher_avatar['und'][0]['uri'] ? $teacher->field_teacher_avatar['und'][0]['uri'] : $default_avatar;
$teacher_avatar_alt = !empty($teacher->field_teacher_avatar) && $teacher->field_teacher_avatar['und'][0]['alt'] ? $teacher->field_teacher_avatar['und'][0]['alt'] : '和盈讲师头像';
$teacher_avatar = get_avatar($teacher_avatar_uri);
$teacher_name = !empty($teacher->field_teacher_name) && $teacher->field_teacher_name['und'][0]['value'] ? $teacher->field_teacher_name['und'][0]['value'] : '';
$teacher_school = !empty($teacher->field_teacher_school) && $teacher->field_teacher_school['und'][0]['value'] ? $teacher->field_teacher_school['und'][0]['value'] : '';
$teacher_degree = !empty($teacher->field_teacher_degree) && $teacher->field_teacher_degree['und'][0]['value'] ? $teacher->field_teacher_degree['und'][0]['value'] : '';
$teacher_level = !empty($teacher->field_teacher_level) && $teacher->field_teacher_level['und'][0]['value'] ? $teacher->field_teacher_level['und'][0]['value'] : '';
$teacher_position = !empty($teacher->field_teacher_position) && $teacher->field_teacher_position['und'][0]['value'] ? $teacher->field_teacher_position['und'][0]['value'] : '';
$teacher_exp_work = !empty($teacher->field_experience_work) && $teacher->field_experience_work['und'][0]['value'] ? $teacher->field_experience_work['und'][0]['value'] : '';
$teacher_exp_train = !empty($teacher->field_experience_training) && $teacher->field_experience_training['und'][0]['value'] ? $teacher->field_experience_training['und'][0]['value'] : '';
$teacher_intro = $teacher_name . '<br>';
if ($teacher_school) {
    $teacher_intro .= $teacher_school . ' ';
}
if ($teacher_degree) {
    $teacher_intro .= $teacher_degree . ' ';
}
if ($teacher_level) {
    $teacher_intro .= $teacher_level . ' ';
}
$teacher_intro .= '<br>';
if ($teacher_position) {
    $teacher_intro .= '公司职务： ' . $teacher_position . '<br>';
}
if ($teacher_exp_work) {
    $teacher_intro .= '开发经验： ' . $teacher_exp_work . '<br>';
}
if ($teacher_exp_train) {
    $teacher_intro .= '培训经验： ' . $teacher_exp_train . '<br>';
}
?>
<div class="content_wrapper">
    <br>
    <div class="teacher-basic-info">
        <br>
        <h3><strong>基本信息：</strong></h3>
        <br>
        <div class="teacher-avatar">
            <img width="100" alt="<?php print $teacher_avatar_alt; ?>" src="<?php print $teacher_avatar ?>">
        </div>
        <div class="teacher-info">
            <?php print $teacher_intro; ?>
        </div>
    </div>
    <div class="teacher-introdution">
        <br>
        <h3><strong>详细介绍：</strong></h3>
        <br>
        <?php print $teacher->body['und'][0]['value']; ?>
    </div>
</div>
