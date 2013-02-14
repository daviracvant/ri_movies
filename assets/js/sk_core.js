/**
 * Created with JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/14/13
 * Time: 9:21 AM
 * To change this template use File | Settings | File Templates.
 */

var sk_core = function ()
{
    return {
        init: function()
        {
            sk_core.bind_events();
            sk_core.base_url = $("#base_url").html();
        },
        bind_events: function()
        {
            $("#sk_filer").change(function()
            {
                sk_core.filter($(this).attr("name"),$(this).val());
            })
        },
        filter: function (url, filter_id)
        {
            window.location = sk_core.base_url + url + '/0/' + filter_id;

        }
    }

}();
$(function()
{
    sk_core.init();
})
