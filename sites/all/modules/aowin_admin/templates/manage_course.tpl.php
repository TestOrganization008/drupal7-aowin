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
            <a href="javascript:">课程管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/course' ?>">课程列表</a>
                </li>
                <li>
                    <a action="" class="manage-nav-control" href="<?php print base_path() . 'node/add/course' ?>">新增课程</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>课程编号</th>
        <th>课程姓名</th>
        <th>课程目标</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($courses)): ?>
                <?php foreach ($courses as $key => $course): ?>
                    <tr class="<?php print ($key%2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $course->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $course->title; ?>
                        </td>
                        <td>
                            <?php print $course->field_goal['und'][0]['value']; ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/course/view/' . $course->nid; ?>">查看详情</a>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'node/' . $course->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/course/delete/' . $course->nid; ?>" href="javascript:{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>