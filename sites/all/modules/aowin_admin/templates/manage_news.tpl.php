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
            <a href="javascript:">新闻管理</a>
            <ul>
                <li>
                    <a class="manage-nav-control" href="<?php print base_path() . 'manage/news' ?>">新闻列表</a>
                </li>
                <li>
                    <a action="" class="manage-nav-control" href="<?php print base_path() . 'node/add/news' ?>">新增新闻</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div class="filter-form">
    <form action="<?php print base_path() . 'manage/news'; ?>" method="get" >
        <label>新闻标题：</label>
        <input name="title" value="<?php print isset($_GET['title']) ? $_GET['title'] : ""; ?>" />
        <label>新闻类型：</label>
        <select name="news_type">
            <?php print get_news_type(); ?>
        </select>
        <input type="submit" value="搜索" />
    </form>
</div>
<div id="manage-main" class="manage-main">
    <table>
        <thead>
        <th>新闻编号</th>
        <th>新闻标题</th>
        <th>新闻类型</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php if (count($news)): ?>
                <?php foreach ($news as $key => $new): ?>
                    <tr class="<?php print ($key % 2) ? 'odd' : 'even'; ?>">
                        <td>
                            <a class="sort-handle" name="<?php print $new->nid; ?>" href="javascript:{void(0);}"><?php print $key + 1; ?></a>
                        </td>
                        <td>
                            <?php print $new->title; ?>
                        </td>
                        <td>
                            <?php print show_new_type($new->field_news_type['und'][0]['tid']); ?>
                        </td>
                        <td>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'manage/news/view/' . $new->nid; ?>">查看详情</a>
                            <a class="edit-item-control" action="" href="<?php print base_path() . 'node/' . $new->nid . '/edit'; ?>">编辑</a>
                            <a class="delete-item-control" action="<?php print base_path() . 'manage/news/delete/' . $new->nid; ?>" href="javascript:{void(0)}" >删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php print theme('pager'); ?>
</div>
<script>
<?php if (isset($_GET['news_type']) && $_GET['news_type']): ?>
        jQuery("select[name=news_type]").val(<?php print $_GET['news_type']; ?>)
<?php endif; ?>
</script>