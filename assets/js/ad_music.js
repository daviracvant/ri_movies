/*
 * Created with JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/10/13
 * Time: 9:33 PM
 * To change this template use File | Settings | File Templates.
 */
var sk_ad_music = function ()
{
    return {
        init: function()
        {
            sk_ad_music.url = $("#base_url").html();
            sk_ad_music.bind_events();
        },
        bind_events: function()
        {
            $("a.admin_play_song").css({cursor:"pointer"}).on("click", function()
            {
               sk_ad_music.play_music($(this).attr("data-path"), $(this).attr("data-extension"));
            })
        },
        play_music: function (path, extension)
        {
            $.ajax({
                url : sk_ad_music.url + 'admin/music/play',
                type: 'POST',
                data: {path: path, extension: extension},
                success: function (response)
                {
                    $("#test_container").removeClass("hidden").html(response);
                }
            })
        }
    }
}();

$(function() {
    sk_ad_music.init();
});