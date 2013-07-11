<?php
/**
 * @file
 * Default template for admin toolbar.
 *
 * Available variables:
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - toolbar: The current template type, i.e., "theming hook".
 * - $toolbar['toolbar_user']: User account / logout links.
 * - $toolbar['toolbar_menu']: Top level management menu links.
 * - $toolbar['toolbar_drawer']: A place for extended toolbar content.
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_toolbar()
 *
 * @ingroup themeable
 */
?>
<div class="manage-nav-left">
    <ul class="sub-menu">
        <li>
            <a href="javascript:">学员管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/student' ?>">学员列表</a>
                </li>
                <li>
                    <a action="" href="<?php print base_path() . 'node/add/student' ?>" class="manage-nav-control" href="javascript:">新增学员</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div class="filter-form">
    <form action="<?php print base_path() . 'manage/student'; ?>" method="get" >
        <label>学员姓名：</label>
        <input id="name" name="name" value="<?php print isset($_GET['name']) ? $_GET['name'] : ""; ?>" />
        <input id="search-student" type="submit" value="搜索" />
        <input type="button" onclick="resetForm()" value="清空" />
    </form>
</div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>序号</th>
        <th>学员编号</th>
        <th>学员姓名</th>
        <th>毕业学校</th>
        <th>最高学历</th>
        <th>毕业时间</th>
        <th>是否就业</th>
        <th>是否就业之星</th>
        <th>录入时间</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($students)): ?>
                <?php foreach ($students as $key => $student): ?>
                    <tr nid="<?php print $student->nid; ?>" class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $student->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $student->title; ?>
                        </td>
                        <td>
                            <?php print $student->field_name['und'][0]['value']; ?>
                        </td>
                        <td>
                            <?php print $student->field_school['und'][0]['value']; ?>
                        </td>
                        <td>
                            <?php print show_degree($student->field_degree['und'][0]['value']); ?>
                        </td>
                        <td>
                            <?php print $student->field_graduate_date['und'][0]['value'] ? date('Y-m-d', $student->field_graduate_date['und'][0]['value']) : ''; ?>
                        </td>
                        <td>
                            <input type="radio" class="has_job" value="1" <?php if ($student->field_has_job['und'][0]['value'] == 1): ?>checked="checked"<?php endif; ?> />是
                            <input type="radio" class="has_job" value="0" <?php if ($student->field_has_job['und'][0]['value'] == 0): ?>checked="checked"<?php endif; ?> />否
                        </td>
                        <td>
                            <input type="radio" class="is_star" value="1" <?php if ($student->field_is_star['und'][0]['value'] == 1): ?>checked="checked"<?php endif; ?> />是
                            <input type="radio" class="is_star"  value="0" <?php if ($student->field_is_star['und'][0]['value'] == 0): ?>checked="checked"<?php endif; ?> />否
                        </td>
                        <td>
                            <?php print date('Y-m-d', $student->created); ?>
                        </td>
                        <td>
                            <a class="view-item-control" href="<?php print base_path() . 'manage/student/view/' . $student->nid; ?>" action="">查看详情</a>
                            <a class="edit-item-control" href="<?php print base_path() . 'node/' . $student->nid . '/edit'; ?>" action="">编辑</a>
        <!--                            <a class="delete-item-control" action="<?php // print base_path() . 'manage/student/delete/' . $student->nid;           ?>" href="javascript:{void(0)}">删除</a>-->
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>
<script>
    function resetForm() {
        jQuery("input#name").val("");
        jQuery("input#search-student").trigger("click");
    }
    jQuery(document).ready(function (){
        jQuery(".has_job").click(function (){
            var url = "<?php print base_path() . 'change_status'; ?>";
            var newStatus = jQuery(this).val();
            var nid = jQuery(this).parents("tr:first").attr("nid");
            var that = this;
            jQuery.post(url, {type: "has_job", nid: nid, status: newStatus}, function (data){
                if (data.success == 1) {
                    jQuery(that).siblings("input.has_job:first").removeAttr("checked");
                }
                else {
                    jQuery(that).removeAttr("checked");
                    alert("改变状态失败");
                }
            }, 'json');
        });
        jQuery(".is_star").click(function (){
            var url = "<?php print base_path() . 'change_status'; ?>";
            var newStatus = jQuery(this).val();
            var nid = jQuery(this).parents("tr:first").attr("nid");
            var that = this;
            jQuery.post(url, {type: "is_star", nid: nid, status: newStatus}, function (data){
                if (data.success == 1) {
                    jQuery(that).siblings("input.is_star:first").removeAttr("checked");
                }
                else {
                    jQuery(that).removeAttr("checked");
                    alert("改变状态失败");
                }
            }, 'json');
        });
    });
</script>