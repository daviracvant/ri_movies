/**
 * Created with JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/13/13
 * Time: 1:32 AM
 * To change this template use File | Settings | File Templates.
 */
var sk_video = function ()
{
    return {
        init: function()
        {
            sk_video.path = $("#path").attr("data-path");
            sk_video.thumbnail = $("#thumbnail").attr("data-thumbnail");
            sk_video.bind_events();
        },
        bind_events: function()
        {
            jwplayer("myElement").setup({
                autostart: true,
                file: sk_video.path,
                image: sk_video.thumbnail,
                width:"568",
                height:"315"
            });
            $("a.comment_reply").on("click", function()
            {
                var user_id = $(this).attr("data-user");
                if (user_id == 0)
                {
                    bootbox.confirm("Login is required to reply this comment. Do you want to login? ",function (result) {

                        if (result) {
                            //do the login.
                        }
                    });
                } else {
                    alert(user_id);
                    //do the comment.
                }
            })
        }
    }
}();

$(function()
{
    sk_video.init();
})