/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
    $(document).ready(function () {
        $(".course_info_control").each(function (i) {
            $(this).bind('click', function() {
                $(".course_info_control").removeClass("active");
                $(this).addClass("active");
                var showDivId = $(this).attr("name");
                $(".course_info_div").hide();
                $("#" + showDivId).parent(".course_info_div").show();
            })
        });
    });
    
})(jQuery);
