/**
 * Created with JetBrains PhpStorm.
 * User: RITHY
 * Date: 1/22/13
 * Time: 11:54 PM
 * To change this template use File | Settings | File Templates.
 */

var auth = function (){
    return {
        init: function() {
            auth.bind_events();
            auth.base_url = $("#base_url").html();
        },

        bind_events: function()
        {
            var options = {
                success: function(response) {// post-submit callback
                    var data = [];
                    try {
                        data = $.parseJSON(response);
                    } catch (err) {
                        alert("Unable to parse response");
                    }
                    if (data.status  == 1)
                    {
                        window.location = auth.base_url + 'admin/home';
                    } else {
                        alert(data.message);
                    }
                }
            };
            // bind form using 'ajaxForm'
            $("#ri_login").ajaxForm(options);

            $("a.reset_password").on("click", function () {
                auth.reset_password();
            })

        },
        reset_password: function ()
        {
            bootbox.prompt("Enter your email", function (result)
            {
                if (result !== null)
                {
                    $.ajax({
                       url: auth.base_url + 'admin/home/reset_password',
                       data: {email:result},
                       type: 'post',
                       success: function (response)
                       {
                           var data = [];
                           try {
                               data = $.parseJSON(response);
                           } catch (err) {
                               alert("Unable to parse response");
                           }
                           bootbox.alert(data.message);
                       }
                    });
                }
            })
        }
    }
}();

$(function() {
    auth.init();
})