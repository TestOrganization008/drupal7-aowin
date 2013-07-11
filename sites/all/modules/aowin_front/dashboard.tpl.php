<script type="text/javascript">
    var t = n =0, count;
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
        t = setInterval("showAuto()", 3000);
        $("#banner").hover(function(){
            clearInterval(t);
        }, function(){
            t = setInterval("showAuto()", 3000);
        }
    );
    });

    function showAuto(){
        n = n >=(count -1) ?0 : ++n;
        $("#banner li").eq(n).trigger('click');
    }
</script>
<div class="center-1">
    <div class="center-1-1">
        <div class="center-1-1-1">最新学员就业喜报</div>
        <div class="center-1-1-2">
            <ul class="ul-jyxx">
                <?php
                foreach ($jyxbs as $jyxb) {
                    ?>
                    <li><?= $jyxb['date'] ?><?= $jyxb['name'] ?>就业薪资<?= $jyxb['salary'] ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="center-1-1-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
    <div class="center-1-2">
        <div class="center-1-2-2">
            <div id="banner">
                <ul>
                    <li class="on">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
                <div id="banner_list">
                    <a href="#" target="_blank"><img src="images/pic/p1.jpg"
                                                     title="" alt="" class="pic_size"/> </a> 
                    <a href="#" target="_blank"><img src="images/pic/p5.jpg" title=""
                                                     alt="" class="pic_size"/> </a> 
                    <a href="#" target="_blank"><img
                            src="images/pic/p3.jpg" title="" alt="" class="pic_size"/> </a>
                    <a href="#" target="_blank"><img src="images/pic/p4.jpg"
                                                     title="" alt="" class="pic_size"/> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="center-1-3">
        <div class="center-1-3-1">最新开班公告</div>
        <div class="center-1-3-2">
            <ul class="ul-jyxx">
                <?php
                foreach ($kbxxs as $kbxx) {
                    ?>
                    <li>和盈<?= $kbxx['name'] ?>开发就业班<br>时间：<?= $kbxx['start_date'] ?> <a class="a-kbxx" href="<?= $_SGLOBAL['path'] ?>/file/class/<?= $kbxx['file'] ?>">相关文件</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="center-1-3-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
</div>
<div class="space-y-10"></div>
<div class="center-2">
    <?php
    foreach ($yss as $ys) {
        ?>
        <div class="center-2-1">
            <div class="center-2-1-1">
                <?= $ys['title'] ?>
            </div>
            <div class="center-2-1-2">
                <div class="center-2-1-2-1">
                    <p><?= $ys['content'] ?></p>
                </div>
            </div>
            <div class="center-2-1-3"><img src="image/advg_pic/<?= $ys['picture'] ?>"></div>
        </div>
        <?php
    }
    ?>
</div>
<div class="space-y-10"></div>
<div class="center-3">
    <div class="center-3-1">
        <div class="center-3-1-1">
            <div class="center-3-1-1-1"><span class="s-cus">课程体系</span></div>
            <div class="center-3-1-1-1"><span class="s-cus">专家师资</span></div>
            <div class="center-3-1-1-1"><span class="s-cus">实训项目</span></div>
            <div class="center-3-1-1-1"><span class="s-cus">合作企业</span></div>
        </div>
        <div class="center-3-1-2">
            <div class="center-3-1-2-1">

            </div>
            <div class="center-3-1-2-2">
                <a href="#" class="a-more">more</a>
            </div>
        </div>
    </div>
    <div class="center-3-2"></div>
    <div class="center-3-3">
        <div class="center-3-3-1">就业名企</div>
        <div class="center-3-3-2">

        </div>
        <div class="center-3-3-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
</div>
<div class="space-y-10"></div>
<div class="center-4">
    <div class="center-4-1">就业之星</div>
    <div class="center-4-2">
        <?php
        foreach ($jyzxs as $jyzx) {
            ?>
            <div class="center-4-2-1">
                <div class="center-4-2-1-1">
                    <img src="images/stu_pic/<?= $jyzx['picture'] ?>" style="width:120px;height:100px;">
                </div>
                <div class="center-4-2-1-2">
                    <?= $jyzx['name'] ?>【<?= $jyzx['company'] ?>】
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="center-4-3">
        <a href="#" class="a-more">more</a>
    </div>
</div>
<div class="space-y-10"></div>
<div class="center-5">
    <div class="center-5-1">
        <div class="center-5-1-1">和盈动态</div>
        <div class="center-5-1-2">
            <ul class="ul-jyxx">
                <?php
                foreach ($news as $new) {
                    ?>
                    <li><?= $new['title'] ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="center-5-1-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
    <div class="center-5-2"></div>
    <div class="center-5-3">
        <div class="center-5-3-1">和盈优势</div>
        <div class="center-5-3-2"></div>
        <div class="center-5-3-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
</div>
<div class="space-y-10"></div>
<div class="center-6">
    <div class="center-6-1">
        <div class="center-6-1-1">合作企业</div>
        <div class="center-6-1-2">
            <div class="center-6-1-2-1">
                <?php
                $i = 1;
                $len = count($hzqys);
                foreach ($hzqys as $hzqy) {
                    ?>
                    <div class="center-6-1-2-1-1"><span title="<?= $hzqy['name'] ?>"><img src="images/cpy_pic/<?= $hzqy['picture'] ?>"></span></div>
                    <?php if ($i % 3 == 0 && $i != $len) { ?>
                    </div>
                    <div class="center-6-1-2-1">
                        <?php
                    }
                    $i = $i + 1;
                }
                ?> 
            </div>
        </div>
        <div class="center-6-1-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
    <div class="center-6-2"></div>
    <div class="center-6-3">
        <div class="center-6-3-1">合作院校</div>
        <div class="center-6-3-2">
            <div class="center-6-1-2-1">
                <?php
                $j = 1;
                $lenj = count($hzyxs);
                foreach ($hzyxs as $hzyx) {
                    ?>
                    <div class="center-6-1-2-1-1"><span title="<?= $hzyx['name'] ?>"><img src="images/sch_pic/<?= $hzyx['logo'] ?>"></span></div>
                    <?php if ($j % 3 == 0 && $j != $lenj) { ?>
                    </div>
                    <div class="center-6-1-2-1">
                        <?php
                    }
                    $j = $j + 1;
                }
                ?> 
            </div>
        </div>
        <div class="center-6-3-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
    <div class="center-6-4"></div>
    <div class="center-6-5">
        <div class="center-6-5-1">学习资料</div>
        <div class="center-6-5-2">
            <ul class="ul-jyxx">
                <?php
                foreach ($xxzls as $xxzl) {
                    ?>
                    <li><?= $xxzl['name'] ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="center-6-5-3">
            <a href="#" class="a-more">more</a>
        </div>
    </div>
</div>
<div class="space-y-10"></div>
<div class="center-7">
    <div class="center-7-1">友情链接</div>
    <div class="center-7-2">
        <?php
        foreach ($urls as $url) {
            ?>
            <span><?= $url['name'] ?></span>
            <?php
        }
        ?>
    </div>
</div>
<div class="space-y-10"></div>