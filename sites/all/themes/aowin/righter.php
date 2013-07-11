<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$courses = retrieve_courses(3);
$famous_companies = retrieve_famous_companies(3);
$news = retrieve_news(array(2, 3), 3);
$ind_news = retrieve_news(array(1), 3);
?>
<div class="main-right">
    <h2><span><strong>我要报名</strong></span></h2>
    <div class="right_block_content">
        <div class=jobstar_outer align=center>
            <script language="javascript">
                function checkdata()
                {
                    if (jQuery("#name").val() == "")
                    {
                        alert("请输入您的用户名");
                        jQuery("#name").focus();
                        return false;
                    }
                    if (jQuery("#phone").val() =="" || jQuery("#phone").val().length < 8 || jQuery("#phone").val().length > 11)
                    {
                        alert("请输入您的联系电话");
                        jQuery("#phone").focus();
                        return false;
                    }
                    if (jQuery("#verify_code").val() =="" || jQuery("#verify_code").val().length != 4)
                    {
                        alert("您输入的的验证码有误");
                        jQuery("#verify_code").focus();
                        return false;
                    }
                    return true;
                }
                function ajaxSubmit() {
                    if (checkdata()) {
                        var name = jQuery("#name").val();
                        var phone = jQuery("#phone").val();
                        var verifyCode = jQuery("#verify_code").val();
                        var applyUrl = "<?php print base_path() . 'apply_online' ?>";
                        jQuery.post(applyUrl, {name: name, phone: phone, verify_code: verifyCode}, function (data){
                            if (data.success == 1) {
                                jQuery("#result-msg").removeAttr("error").addClass("status").html(data.msg);
                            }
                            else {
                                jQuery("#result-msg").addClass("error").html(data.msg);
                            }
                        }, 'json');
                    }
                    else {
                        return false;
                    }
                }
                jQuery(document).ready(function (){
                    jQuery("#verify").click(function (){
                        var verifyUrl = "<?php print base_path() . 'verify'; ?>";
                        var now = new Date().getTime();
                        jQuery(this).attr("src", verifyUrl + "?t=" + now);
                    });
                });
            </script>

            <form id=form2  method=post name=form2>
                <table border=0 cellSpacing=0 cellPadting=0 width=220>
                    <tbody>
                        <tr>
                            <td height="35" width=45>姓名：</td>
                            <td width="170"><input size=18 id="name" name="name"></td>
                        </tr>
                        <tr>
                            <td height=35 width=45>电话：</td>
                            <td><input size=18 id="phone" name="phone"></td>
                        </tr>
                        <tr>
                            <td height=35 width=45>验证码：<img id="verify" src="<?php print base_path() . 'verify'; ?>" /></td>
                            <td><input size=18 id="verify_code" name="verify_code"></td>
                        </tr>
                        <tr>
                            <td height=35 colspan=2>
                                <div align=center>
                                    <a class="btn" onclick="ajaxSubmit()">在线报名</a> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height=35 colspan=2>
                                <div style="background: no-repeat" id="result-msg" align=center></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="right_block_footer"><span>&nbsp;</span></div>
    <div class="delimiter1"></div>
    <div class=youkecheng>
        <h2>
            <span><strong>优势课程</strong></span>
        </h2>
        <div class="right_block_content">
            <ul>
                <?php foreach ($courses as $value): ?>
                    <li><a href="<?php print base_path() . 'courses/' . $value->nid; ?>"><?php print $value->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="right_block_footer">
            <span>&nbsp;</span><a href="<?php print base_path() . 'courses'; ?>">[更多]</a>
        </div>
    </div>
    <div class="delimiter1"></div>
    <div class="news_short">
        <h2>
            <span><strong>和盈动态</strong></span>
        </h2>
        <div class="right_block_content">
            <ul>
                <?php foreach ($news as $value): ?>
                    <li><a href="<?php print base_path() . 'news/' . $value->nid; ?>"><?php print $value->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="right_block_footer">
            <span>&nbsp;</span><a href="<?php print base_path() . 'news'; ?>">[更多]</a>
        </div>
    </div>
    <div class="delimiter1"></div>
    <div class=company>
        <h2><span><strong>就业名企</strong></span></h2>
        <div class="right_block_content">
            <ul>
                <?php foreach ($famous_companies as $value): ?>
                    <li><a href="<?php print base_path() . 'famous_companies/' . $value->nid; ?>"><?php print $value->title; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="right_block_footer">
            <span>&nbsp;</span><a href="<?php print base_path() . 'famours_companies'; ?>">[更多]</a>
        </div>
        <div class="delimiter1"></div>
        <div class=skill>
            <h2>
                <span><strong>行业动态</strong></span>
            </h2>
            <div class="right_block_content">
                <ul>
                    <?php foreach ($ind_news as $value): ?>
                        <li><a href="<?php print base_path() . 'news/' . $value->nid; ?>"><?php print $value->title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="right_block_footer">
                <span>&nbsp;</span><a href="<?php print base_path() . 'news'; ?>">[更多]</a>
            </div>
        </div>
    </div>
</div>