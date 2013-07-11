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
            <a href="javascript:">前台页面管理</a>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>页面序号</th>
        <th>页面标题</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($front_pages)): ?>
                <?php foreach ($front_pages as $key => $front_page): ?>
                    <tr class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $front_page['path']; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $front_page['title']; ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/front_page/view/' . $front_page['path']; ?>">查看</a>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/front_page/edit/' . $front_page['path']; ?>">编辑</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>