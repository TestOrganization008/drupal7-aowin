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
global $user;
?>
<div class="manage-nav-left">
    <ul class="sub-menu">
        <li>
            <a href="<?php print base_path() . 'manage'; ?>">首页</a>
        </li>
    </ul>
</div>
<div class="delimiter"></div>
<div id="manage-main" class="manage-main">
    <div class="main_title"><h2><?php print $site_info; ?></h2></div>
    <table cellspacing="0" cellpadding="0" class="form">
        <tbody>
            <tr>
                <td class="topTd" colspan="2"></td>
            </tr>

            <tr>
                <td style="width:200px;" class="item_title">
                    公司
                </td>
                <td class="item_input">
                    杭州和盈科技
                </td>
            </tr>

            <tr>
                <td style="width:200px;" class="item_title">
                    当前登陆用户			
                </td>
                <td class="item_input">
                    <?php
                    print $user->name;
                    ?>
                </td>
            </tr>

            <tr>
                <td style="width:200px;" class="item_title">
                    当前时间			
                </td>
                <td class="item_input">
                    <?php print date('Y-m-d H:i:s', time()); ?>			
                </td>
            </tr>

            <tr>
                <td style="width:200px;" class="item_title">
                    上次登陆时间
                </td>
                <td class="item_input">
                    <?php print date('Y-m-d H:i:s', $user->login) ?>
                </td>
            </tr>

            <tr>
                <td class="bottomTd" colspan="2"></td>
            </tr>
        </tbody></table>
</div>