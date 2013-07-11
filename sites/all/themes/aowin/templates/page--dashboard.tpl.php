<?php include dirname(__FILE__) . '/../header.php'; ?>
<?php $theme_path = drupal_get_path('theme', 'aowin'); ?>
<link rel="stylesheet" type="text/css" href="<?php print base_path() . $theme_path . '/js/chocoslider/estilo.css' ?>" />
<div id="wrapper">
    <div id="container" class="clearfix">
        <div class="center-1">
            <?php if ($page['dashboard_top_left']): ?>
                <div class="center-1-1"><?php print render($page['dashboard_top_left']); ?></div>
            <?php endif; ?>
            <div class="center-1-2-2">
                <div id="slider">
                    <a href="#"><img src="<?php print base_path() . $theme_path . '/images/pic/2011021414275729280.jpg'; ?>" title="" alt="" class="pic_size"/> </a> 
                    <a href="#"><img src="<?php print base_path() . $theme_path . '/images/pic/2011021600315975100.jpg'; ?>" title="" alt="" class="pic_size"/> </a> 
                    <a href="#"><img src="<?php print base_path() . $theme_path . '/images/pic/2011022022115144796.jpg'; ?>" title="" alt="" class="pic_size"/> </a>
                </div>
            </div>

            <?php if ($page['dashboard_top_right']): ?>
                <div class="center-1-3"><?php print render($page['dashboard_top_right']); ?></div>
            <?php endif; ?>
        </div>
        <div class="space-y-10"></div>
        <?php
        $about_path = drupal_lookup_path('source', 'about');
        $about_aowin = menu_get_object('node', 1, $about_path);
        $aowin_teacher_path = drupal_lookup_path('source', 'teacher');
        $aowin_teacher = menu_get_object('node', 1, $aowin_teacher_path);
        $aowin_course_path = drupal_lookup_path('source', 'course');
        $aowin_course = menu_get_object('node', 1, $aowin_course_path);
        $aowin_job_path = drupal_lookup_path('source', 'job');
        $aowin_job = menu_get_object('node', 1, $aowin_job_path);
        ?>
        <div class="center-2">
            <div class="center-2-1">
                <div class="center-2-1-1"><a href="<?php print base_path() . 'about' ?>"><?php print $about_aowin->title; ?></a></div>
                <div class="center-2-1-2">
                    <div class="center-2-1-2-1">
                        <?php print $about_aowin->body['und'][0]['summary']; ?>
                    </div>
                </div>
                <div class="center-2-1-3"><img src="<?php print base_path() . $theme_path . '/images/advg_pic/c21.gif' ?>"></div>
            </div>
            <div class="center-2-1">
                <div class="center-2-1-1"><a href="<?php print base_path() . 'course' ?>"><?php print $aowin_course->title; ?></a></div>
                <div class="center-2-1-2">
                    <div class="center-2-1-2-1">
                        <?php print $aowin_course->body['und'][0]['summary']; ?>
                    </div>
                </div>
                <div class="center-2-1-3"><img src="<?php print base_path() . $theme_path . '/images/advg_pic/c22.gif' ?>"></div>
            </div>
            <div class="center-2-1">
                <div class="center-2-1-1"><a href="<?php print base_path() . 'teacher' ?>"><?php print $aowin_teacher->title; ?></a></div>
                <div class="center-2-1-2">
                    <div class="center-2-1-2-1">
                        <?php print $aowin_teacher->body['und'][0]['summary']; ?>
                    </div>
                </div>
                <div class="center-2-1-3"><img src="<?php print base_path() . $theme_path . '/images/advg_pic/c23.gif' ?>"></div>
            </div>
            <div class="center-2-1">
                <div class="center-2-1-1"><a href="<?php print base_path() . 'job' ?>"><?php print $aowin_job->title; ?></a></div>
                <div class="center-2-1-2">
                    <div class="center-2-1-2-1">
                        <?php print $aowin_job->body['und'][0]['summary']; ?>
                    </div>
                </div>
                <div class="center-2-1-3"><img src="<?php print base_path() . $theme_path . '/images/advg_pic/c24.gif' ?>"></div>
            </div>
        </div>
        <div class="space-y-10"></div>
        <div class="center-3">
            <div class="center-3-1">
                <div class="part2_top">
                    <div name="part2_topn1" class="active" onmouseover="showBlock(this);">课程体系</div>
                    <div name="part2_topn2" class="" onmouseover="showBlock(this);">专业师资</div>
                    <div name="part2_topn3" class="" onmouseover="showBlock(this);">实训项目</div>
                </div> 
                <div class="train_sp">
                    <?php if ($page['dashboard_main_center_left_1']): ?>
                        <div class="train_sp_center train_sp_center_part2_topn1"><?php print render($page['dashboard_main_center_left_1']); ?></div>
                    <?php endif; ?>
                    <?php if ($page['dashboard_main_center_left_2']): ?>
                        <div class="train_sp_center train_sp_center_part2_topn2"><?php print render($page['dashboard_main_center_left_2']); ?></div>
                    <?php endif; ?>
                    <?php if ($page['dashboard_main_center_left_3']): ?>
                        <div class="train_sp_center train_sp_center_part2_topn3"><?php print render($page['dashboard_main_center_left_3']); ?></div>
                    <?php endif; ?>
                </div> 
            </div>
            <div class="center-3-2"></div>
            <?php if ($page['dashboard_main_center_right']): ?>
                <div class="center-3-3"><?php print render($page['dashboard_main_center_right']); ?></div>
            <?php endif; ?>
        </div>
        <div class="space-y-10"></div>
        <?php if ($page['dashboard_main_center_2']): ?>
            <div class="center-4"><?php print render($page['dashboard_main_center_2']); ?></div>
        <?php endif; ?>
        <div class="space-y-10"></div>
        <div class="center-5">
            <?php if ($page['dashboard_main_bottom_left']): ?>
                <div class="center-5-1"><?php print render($page['dashboard_main_bottom_left']); ?></div>
            <?php endif; ?>
            <div class="center-5-2"></div>
            <?php if ($page['dashboard_main_bottom_right']): ?>
                <div class="center-5-3"><?php print render($page['dashboard_main_bottom_right']); ?></div>
            <?php endif; ?>
        </div>
        <div class="space-y-10"></div>
        <div class="center-6">
            <?php if ($page['dashboard_main_bottom_left_left']): ?>
                <div class="center-6-1"><?php print render($page['dashboard_main_bottom_left_left']); ?></div>
            <?php endif; ?>
            <div class="center-6-2"></div>
            <?php if ($page['dashboard_main_bottom_left_right']): ?>
                <div class="center-6-3"><?php print render($page['dashboard_main_bottom_left_right']); ?></div>
            <?php endif; ?>
            <div class="center-6-4"></div>
            <?php if ($page['dashboard_main_bottom_right_left']): ?>
                <div class="center-6-5"><?php print render($page['dashboard_main_bottom_right_left']); ?></div>
            <?php endif; ?>
        </div>
        <div class="space-y-10"></div>

        <?php if ($page['dashboard_bottom']): ?>
            <div class="center-7"><?php print render($page['dashboard_bottom']); ?></div>
        <?php endif; ?>
        <div class="space-y-10"></div>
    </div> <!-- /#container -->
</div> <!-- /#wrapper -->
<script src="<?php print base_path() . $theme_path . '/js/chocoslider/jquery.chocoslider.js' ?>" ></script>
<script type="text/javascript">
        
    var $ = jQuery;
    var t = n =0, count;
    $('#slider').chocoslider();
    $(function(){ 
        count=$("#banner_list a").length;
        $("#banner_list a:not(:first-child)").hide();
        $("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
        $("#banner_info").click(function(){
            window.open($("#banner_list a:first-child").attr('href'), "_blank");
        });
        $("#banner li").click(function() {
            var i = $(this).text() -1;
            n = i;
            if (i >= count) return;
            $("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
            $("#banner_info").unbind().click(function(){
                window.open($("#banner_list a").eq(i).attr('href'), "_blank");
            });
            $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
            document.getElementById("banner").style.background="";
            $(this).toggleClass("on");
            $(this).siblings().removeAttr("class");
        });
        t = setInterval("showAuto()", 15000);
        $("#banner").hover(function(){
            clearInterval(t);
        }, function(){
            t = setInterval("showAuto()", 15000);
        }
    );
    });

    function showAuto(){
        n = n >=(count -1) ?0 : ++n;
        $("#banner li").eq(n).trigger('click');
    }
    function showBlock(div) {
        var className = $(div).attr("name");
        $(".part2_top").children("div").removeClass("active");
        $(div).addClass("active");
        $(".train_sp_center").hide();
        $(".train_sp_center_" + className).show();
    }
</script>
<?php include dirname(__FILE__) . '/../footer.php'; ?>