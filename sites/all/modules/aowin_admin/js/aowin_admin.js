/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
    $(document).ready(function(){
        $(".manage-nav-control").live("click", function () {
            var actionPath = $(this).attr("action");
            if (actionPath != "") {
                $.post(actionPath, {}, function (html) {
                    if (html) {
                        $("#manage-main").html(html);
                    }
                })
            }
        });
        $(".edit-item-control").live("click", function() {
            var actionPath = $(this).attr("action");
            if (actionPath != "") {
                $.post(actionPath, {}, function (html) {
                    if (html) {
                        $("#manage-main").html(html);
                    }
                })
            }
            
        });
        $(".delete-item-control").live("click", function() {
            var that = this;
            var actionPath = $(this).attr("action");
            if (confirm("你确定要删除该条记录吗")) {
                $.post(actionPath, {}, function (data) {
                    if (data.success) {
                        $(that).parents("tr:eq(0)").remove();
                    }
                    else {
                        alert(data.msg);
                    }
                }, "json");
            }
        });
    });
})(jQuery);