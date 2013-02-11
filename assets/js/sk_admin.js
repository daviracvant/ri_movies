/**
 * Created with JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/10/13
 * Time: 9:33 PM
 * To change this template use File | Settings | File Templates.
 */
var sk_admin = function ()
{
    return {
        init: function()
        {
            sk_admin.menu_item = "submenu_" + $("#menu_submenu").attr("data-item");
            sk_admin.submenu = $("#menu_submenu").attr("data-menu");
            sk_admin.menu = "menu_" + sk_admin.submenu;
            console.log(sk_admin.menu);
            console.log(sk_admin.submenu);
            console.log(sk_admin.menu_item);
            sk_admin.url = $("#base_url").html();
            sk_admin.bind_events();
            sk_admin.set_sidebar();
        },
        bind_events: function()
        {
            $(".menu_icon").on("click", function () {
                var accordion = $(this);
                $(".menu_icon").each(function() {
                    $(this).removeClass("active");
                })
                accordion.addClass("active");
            });
            $("#sk_login").submit(function(event)
            {
                event.preventDefault();
                sk_admin.login($(this));
            });
            $("a.reset_password").css({cursor:'pointer'});

            $("#submit_edit_profile").submit(function(event){
                event.preventDefault();
                sk_admin.submit_post($(this));
            });
            $("#submit_change_pw").submit(function(event) {
                event.preventDefault();
                sk_admin.submit_post($(this));
            });
//            $("a.admin_edit_profile").on("click", function() {
//                sk_admin.edit_profile($(this).attr("data-id"));
//                $(".profile").addClass("active");
//            });
            $("#submenu_upload_music").on("click", function()
            {
                window.location = sk_admin.url + "admin/music/upload";
            })
            $("#music_upload").submit(function(event) {
                event.preventDefault();
                var option = {
                    success: function(response)
                    {
                        var data = [];
                        try {
                            data = $.parseJSON(response);
                        } catch(error) {
                            alert(error);
                        }
                        bootbox.alert(data.message);
                    }
                }
                $(this).ajaxSubmit(option);
            })
        },
        set_sidebar: function ()
        {
            $("#"+sk_admin.menu).addClass("active");
            $("#"+sk_admin.submenu).addClass("in");
            $("#"+sk_admin.menu_item).addClass("active");
        },
        login: function(form)
        {
            $.post(form.attr("action"), form.serialize(), function(response)
            {
                var data = [];
                try  {
                    data = $.parseJSON(response);
                } catch (err) {
                    console.log(err);
                }
                if (data.status == 1)
                {
                    window.location = sk_admin.url + 'admin/home';
                } else if (data.status == 0)
                {
                    bootbox.alert(data.message);
                }

            })
        },
        submit_post: function (form)
        {
            $.post(form.attr("action"), form.serialize(), function(response)
            {
                var data = [];
                try  {
                    data = $.parseJSON(response);
                } catch(error) {
                    alert(error);
                }
                if (data.status == 1) {
                    bootbox.alert(data.message);
                } else {
                    bootbox.alert(data.message);
                }
            })

        }

    }
}();

$(function() {
    sk_admin.init();
});