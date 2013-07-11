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
<style>
    .add_new_job_info {
        width: 98%;
        text-align: left;
        margin-top: 5px;
    }
    #add_new_job_info_form_container {
        display: none;
    }
</style>
<div class="manage-nav-left">
    <ul class="sub-menu">
        <li>
            <a href="javascript:">学员就业管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/job' ?>">学员就业列表</a>
                </li>
                <!--                <li>
                                    <a class="add-job-info" onclick="addJob()" href="javascript:{void(0);}">新增学员就业信息</a>
                                </li>-->
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div class="filter-form">
    <form action="<?php print base_path() . 'manage/student'; ?>" method="get" >
        <label>学员姓名：</label>
        <input id="name" name="student_name" value="<?php print isset($_GET['student_name']) ? $_GET['student_name'] : ""; ?>" />
        <input id="search-student" type="submit" value="搜索" />
        <input type="button" onclick="resetForm()" value="清空" />
    </form>
</div>
<div id="manage-main" class="manage-main">
    <div class="add_new_job_info">
        <div class="messages" style="display:none;" id="job-message"></div>
        <input id="add_new_job_control" type="button" value="新增" onclick="addJob()" />
        <div id="add_new_job_info_form_container">
            <form id="add_new_job" method="post" onsubmit="return false;" action ="<?php print base_path() . 'manage/job/save' ?>">
                <div>
                    <label for="edit-name">学员 <span title="此项必填。" class="form-required">*</span></label>
                    <select id="choose-student" name="sid">
                        <option value="0">-- 请选择  --</option>
                        <?php foreach ($students as $key => $student): ?>
                            <option value="<?php print $student->nid; ?>"><?php print $student->title . '--' . $student->name . '--' . $student->class_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="id" value="0" id="edit-job-id" />
                    <input type="hidden" maxlength="255" size="60" value="" name="name" id="edit-name"/>
                    <input type="hidden" maxlength="255" size="60" value="" name="class_name" id="edit-class-name"/>
<!--                    <input type="hidden" maxlength="128" size="60" value="" name="cid" id="edit-cid">-->
                </div>
                <div class="form-item form-type-textfield form-item-company">
                    <label for="edit-company">就业单位 <span title="此项必填。" class="form-required">*</span></label>
                    <input type="text" class="form-text" maxlength="255" size="60" value="" name="company" id="edit-company">
                </div>
                <div class="form-item form-type-textfield form-item-date">
                    <label for="edit-date">就业时间 </label>
                    <input type="text" class="form-text" maxlength="128" size="60" value="" name="date" id="edit-date">
                </div>
                <div class="form-item form-type-textfield form-item-salary">
                    <label for="edit-salary">工资 </label>
                    ￥<input type="text" class="form-text" maxlength="128" size="60" value="" name="salary" id="edit-salary">
                </div>
                <div class="form-item form-type-textfield form-item-is-index">
                    <label for="edit-is-index">是否显示在首页 </label>
                    <input type="checkbox" name="is_index" id="edit-is-index">
                </div>
                <input type="submit" class="form-submit" value="保存" onclick="doSubmit()" name="op" id="edit-submit" />
                <input type="reset" class="form-submit" value="重置" />
                <input id="cancel-save" type="button" class="form-submit" value="取消" />
        </div>
        </form>
    </div>
    <table>
        <thead>
        <th>编号</th>
        <th>学员姓名</th>
<!--        <th>所在班级</th>-->
        <th>就业单位</th>
        <th>就业时间</th>
        <th>工资</th>
        <th>是否首页显示</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($jobs)): ?>
                <?php foreach ($jobs as $key => $job): ?>
                    <tr nid="<?php print $job->id; ?>" class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $job->id; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $job->name; ?>
                        </td>
        <!--                        <td>
                        <?php // print $job->class_name; ?>
                        </td>-->
                        <td>
                            <?php print $job->company; ?>
                        </td>
                        <td>
                            <?php print $job->date; ?>
                        </td>
                        <td>
                            <?php print $job->salary; ?>
                        </td>
                        <td>
                            <input type="radio" class="is_index" value="1" <?php if ($job->is_index): ?>checked="checked"<?php endif; ?> />是
                            <input type="radio" class="is_index" value="0" <?php if (!$job->is_index): ?>checked="checked"<?php endif; ?> />否
                            <?php // print $job->is_index ? '是' : '否'; ?>
                        </td>
                        <td>
                            <a class="edit-item-control-job" job-id="<?php print $job->id; ?>" sid="<?php print $job->sid; ?>" student-name="<?php print $job->name; ?>" class-name="<?php print $job->class_name; ?>"
                               company="<?php print $job->company; ?>" salary="<?php print $job->salary; ?>" date="<?php print $job->date; ?>" is-index="<?php print $job->is_index; ?>" action="" onclick="editJob(this)" href="javascript:{void(0);}">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/job/delete/' . $job->id; ?>" href="javascript:{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>
<script>
    function addJob() {
        jQuery("#add_new_job_info_form_container").find("input[type!=submit][type!=reset][type!=checkbox][type!=button]").val("");
        jQuery("#edit-is-index").attr("checked", false);
        jQuery("#choose-student").val(0);
        jQuery("#add_new_job_info_form_container").show();
        jQuery("#add_new_job_control").hide();
    }
    function editJob(link) {
        var id = jQuery(link).attr("job-id");
        var sid = jQuery(link).attr("sid");
        var name = jQuery(link).attr("student-name");
        var className = jQuery(link).attr("class-name");
        var company = jQuery(link).attr("company");
        var date = jQuery(link).attr("date");
        var salary = jQuery(link).attr("salary");
        var isIndex = jQuery(link).attr("is-index");
        jQuery("#edit-job-id").val(id);
        jQuery("#edit-name").val(name);
        jQuery("#edit-class-name").val(className);
        jQuery("#edit-company").val(company);
        jQuery("#edit-salary").val(salary);
        jQuery("#edit-date").val(date);
        jQuery("#edit-is-index").attr("checked", isIndex > 0 ? true : false);
        jQuery("<option value='" + sid + "'>" + name + "</option>").appendTo(jQuery("#choose-student"));
        jQuery("#choose-student").val(sid);
        jQuery("#add_new_job_info_form_container").show();
        jQuery("#add_new_job_control").hide();
    }
    function doSubmit() {
        var id = jQuery("#edit-job-id").val();
        var sid = jQuery("#choose-student").val();
        var company = jQuery("#edit-company").val();
        var name = jQuery("#edit-name").val();
        var className = jQuery("#edit-class-name").val();
        var date = jQuery("#edit-date").val();
        var salary = jQuery("#edit-salary").val();
        var isIndex = jQuery("#edit-is-index").attr("checked") ? 1 : 0;
        if (!sid) {
            alert("请选择一位学员");
            return false;
        }
        if (!jQuery.trim(company)) {
            alert("请填写就业单位");
            return false;
        }
        jQuery.post("<?php print base_path() . 'manage/job/save'; ?>", {
            id: id,
            sid: sid,
            company: company,
            name: name,
            class_name: className,
            date: date,
            salary: salary,
            is_index: isIndex
        }, function (result) {
            if (result.success) {
                jQuery("#job-message").addClass("status").html(result.msg).show();
                window.location.href = window.location.href;
            }
            else {
                jQuery("#job-message").addClass("error").html(result.msg).show();
            }
        }, 'json')
    }
    (function($) {
        $(document).ready(function () {
            $("#edit-date").datepicker({dateFormat:"yy-mm-dd",changeMonth: true,changeYear: true,yearRange:"-3:+0"});
            $("#choose-student").live("change", function () {
                var sid = $(this).val();
                var info = $(this).children("option:selected").text();
                var infoArr = info.split("--", 2);
                var studentName = infoArr[1];
                var className = infoArr[2];
                if (studentName) {
                    $("#edit-name").val(studentName);
                }
                if (className) {
                    $("#edit-class-name").val(className);
                }
            });
            $("#cancel-save").bind("click", function (){
                window.location.href = window.location.href;
            });
        });
    })(jQuery);
</script>
<script>
    function resetForm() {
        jQuery("input#student_name").val("");
        jQuery("input#search-student").trigger("click");
    }
    jQuery(document).ready(function (){
        jQuery(".is_index").click(function (){
            var url = "<?php print base_path() . 'change_status'; ?>";
            var newStatus = jQuery(this).val();
            var nid = jQuery(this).parents("tr:first").attr("nid");
            var that = this;
            jQuery.post(url, {type: "is_index", nid: nid, status: newStatus}, function (data){
                if (data.success == 1) {
                    jQuery(that).siblings("input.is_index:first").removeAttr("checked");
                    jQuery(that).parents("tr:first").find("a.edit-item-control-job:first").attr("is-index", newStatus);
                }
                else {
                    jQuery(that).removeAttr("checked");
                    alert("改变状态失败");
                }
            }, 'json');
        });
    });
</script>