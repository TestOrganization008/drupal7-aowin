<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $user;
$thmem_path = drupal_get_path('theme', 'aowin');
?>
<!--<link rel="stylesheet" type="text/css" href="<?php print base_path() . $thmem_path . '/js/wbox/wbox/wbox-min.css'; ?>" />-->
<div class="head">
    <div class="head-top">
        <a href="javascript:void(0)" onclick="SetHome(this,window.location)" class="head-a-1" onfocus="this.blur()">设为首页</a>
        <a href="javascript:void(0)" onclick="AddFavorite(window.location,document.title)" class="head-a-1" onfocus="this.blur()">收藏本站</a>

    </div>
    <div class="head-div-1"></div>
    <div class="head-div-2"></div>
    <div class="head-div-3"></div>
    <div class="head-div-4"></div>

</div>
<div class="head-div-title">
    <div class="head-title-list">
        <div class="head-menu active">
            <a class="a-title menu-dashboard" href="<?php print base_path() . 'dashboard'; ?>">首页</a>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu  menu-parent">
            <a class="a-title" href="<?php print base_path() . 'about'; ?>">选择和盈</a>
            <ul style="display: none; visibility: hidden;">
                <li class="first even"><a title="就业汇报" href="<?php print base_path() . 'choose_aowin'; ?>">选择理由</a></li>
            </ul>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu">
            <a class="a-title" href="<?php print base_path() . 'courses'; ?>">课程体系</a>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu">
            <a class="a-title" href="<?php print base_path() . 'teachers'; ?>">精英师资</a>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu menu-parent">
            <a class="a-title" href="<?php print base_path() . 'jobs'; ?>">就业广场</a>
            <ul style="display: none; visibility: hidden;">
                <li class="first even "><a title="就业汇报" href="<?php print base_path() . 'jobs/job_list'; ?>">就业汇报</a></li>
                <li class="last odd"><a title="合作企业" href="<?php print base_path() . 'jobs/companies'; ?>">合作企业</a></li>
            </ul>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu">
            <a class="a-title" href="<?php print base_path() . 'service'; ?>">企业服务</a>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu">
            <a class="a-title" href="<?php print base_path() . 'certification'; ?>">权威认证</a>
        </div>
        <div class="head-menu-space">|</div>
        <div class="head-menu">
            <a class="a-title" href="<?php print base_path() . 'materials'; ?>">学习资料</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    /**加入收藏夹**/
    jQuery.noConflict();
    function AddFavorite(sURL, sTitle) {
        try {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }
    /**设置主页**/
    function SetHome(obj, vrl) {
        try {
            obj.style.behavior = 'url(#default#homepage)'; obj.setHomePage(vrl);
        }
        catch (e) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                }
                catch (e) {
                    alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
                }
                var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                prefs.setCharPref('browser.startup.homepage', vrl);
            }
        }
    }
    //    jQuery("#show-admin-login-form").wBox({
    //        title: "管理员登录",
    //        requestType:"iframe",
    //        target:"<?php print base_path() . 'login'; ?>",
    //        callBack: function () {
    //            jQuery("iframe[name=wBoxIframe]").attr('scrolling', "no");
    //            jQuery("iframe[name=wBoxIframe]").css("width", "400px");
    //        }
    //    });
    function getCurrentPage(url) {
        if (url.indexOf("dashboard") > 0) {
            return 0;
        }
        if (url.indexOf("about") > 0 || url.indexOf("choose_aowin") > 0) {
            return 1;
        }
        if (url.indexOf("courses") > 0) {
            return 2;
        }
        if (url.indexOf("teachers") > 0) {
            return 3;
        }
        if (url.indexOf("jobs") > 0) {
            return 4;
        }
        if (url.indexOf("service") > 0) {
            return 5;
        }
        if (url.indexOf("certification") > 0) {
            return 6;
        }
        if (url.indexOf("materials") > 0) {
            return 7;
        }
        return 0;
    }
    var currentUrl = window.location.href;
    var currentPage = getCurrentPage(currentUrl);
    jQuery("div.head-div-title:first").find(".head-menu").removeClass("active").eq(currentPage).addClass("active");
    jQuery(document).ready(function (){
        jQuery(".menu-parent a.a-title").hover(function (){
            jQuery(this).parent("div").children("ul").css("display", "block").css("visibility", "visible");
        }, function (){
            //jQuery(this).children("ul").css("display", "none").css("visibility", "hidden");
        });
        jQuery(".menu-parent").hover(function (){
            //jQuery(this).parent("div").children("ul").css("display", "block").css("visibility", "visible");
        }, function (){
            jQuery(this).children("ul").css("display", "none").css("visibility", "hidden");
        });
        jQuery(".menu-parent ul").hover(function (){
            jQuery(this).css("display", "block").css("visibility", "visible");
        }, function (){
            jQuery(this).css("display", "none").css("visibility", "hidden");
        });
    });
</script>