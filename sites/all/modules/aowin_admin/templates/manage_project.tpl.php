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
            <a href="javascript:">项目管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/project' ?>">项目列表</a>
                </li>
                <li>
                    <a action="" class="manage-nav-control" href="<?php print base_path() . 'node/add/project' ?>">新增项目</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>项目编号</th>
        <th>项目名称</th>
        <th>项目简介</th>
        <th>创建时间</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($projects)): ?>
                <?php foreach ($projects as $key => $project): ?>
                    <tr class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $project->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $project->title; ?>
                        </td>
                        <td>
                            <?php print $project->field_project_brief_introduction['und'][0]['value']; ?>
                        </td>
                        <td>
                            <?php print $project->created ? date('Y-m-d', $project->created) : ''; ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/project/view/' . $project->nid; ?>">查看详情</a>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'node/' . $project->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="" href="<?php print base_path() . 'manage/project/delete/' . $project->nid; ?>" href="javascript:{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>