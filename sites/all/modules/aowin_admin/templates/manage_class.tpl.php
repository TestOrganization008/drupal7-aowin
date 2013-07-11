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
            <a href="javascript:">班级管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/class' ?>">班级列表</a>
                </li>
                <li>
                    <a action="" class="manage-nav-control" href="<?php print base_path() . 'node/add/class' ?>">新增班级</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>班级编号</th>
        <th>班级姓名</th>
        <th>课程姓名</th>
        <th>开始时间</th>
        <th>班级状态</th>
        <th>班级简介</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($train_classes)): ?>
                <?php foreach ($train_classes as $key => $class): ?>
                    <tr class="<?php print ($key%2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $class->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $class->title; ?>
                        </td>
                        <td>
                            <?php print $class->course_name; ?>
                        </td>
                        <td>
                            <?php print $class->field_class_start['und'][0]['value'] ? date('Y-m-d', $class->field_class_start['und'][0]['value']) : ''; ?>
                        </td>
                        <td>
                            <?php print $class->field_class_status['und'][0]['value'] ? '热招中' : '已开课'; ?>
                        </td>
                        <td>
                            <?php print $class->body['und'][0]['value']; ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/class/view/' . $class->nid; ?>">查看详情</a>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'node/' . $class->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/class/delete/' . $class->nid; ?>" href="javascript{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>