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
            <a href="javascript:">讲师管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/teacher' ?>">讲师列表</a>
                </li>
                <li>
                    <a action="" href="<?php print base_path() . 'node/add/teacher' ?>" class="manage-nav-control" href="javascript:">新增讲师</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>序号</th>
        <th>讲师编号</th>
        <th>讲师姓名</th>
        <th>工作经历</th>
        <th>培训经历</th>
        <th>录入日期</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($teachers)): ?>
                <?php foreach ($teachers as $key => $teacher): ?>
                    <tr class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $teacher->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $teacher->title; ?>
                        </td>
                        <td>
                            <?php print $teacher->field_teacher_name['und'][0]['value']; ?>
                        </td>
                        <td>
                            <?php print $teacher->field_experience_work['und'][0]['value'] ? $teacher->field_experience_work['und'][0]['value'] : ''; ?>
                        </td>
                        <td>
                            <?php print $teacher->field_experience_training['und'][0]['value'] ? $teacher->field_experience_training['und'][0]['value'] : ''; ?>
                        </td>
                        <td>
                            <?php print date('Y-m-d', $teacher->created); ?>
                        </td>
                        <td>
                            <a class="edit-item-control" ation="" href="<?php print base_path() . 'manage/teacher/view/' . $teacher->nid; ?>">查看详情</a>
                            <a class="edit-item-control" ation="" href="<?php print base_path() . 'node/' . $teacher->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/teacher/delete/' . $teacher->nid; ?>" href="javascript:{void(0)}">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>