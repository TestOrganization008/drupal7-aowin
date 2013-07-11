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
            <a href="javascript:">友情链接</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/buddy_link' ?>">友情链接列表</a>
                </li>
                <li>
                    <a action="" class="manage-nav-control" href="<?php print base_path() . 'node/add/buddy-link' ?>">新增友情链接</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>链接序号</th>
        <th>链接地址</th>
        <th>链接名称</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($buddy_links)): ?>
                <?php foreach ($buddy_links as $key => $buddy_link): ?>
                    <tr class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $buddy_link->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $buddy_link->title; ?>
                        </td>
                        <td>
                            <?php print $buddy_link->field_buddy_link_name['und'][0]['value']; ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'node/' . $buddy_link->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/buddy_link/delete/' . $buddy_link->nid; ?>" href="javascript:{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>