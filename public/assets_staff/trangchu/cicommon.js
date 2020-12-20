/**
 * common js
 *
 * @package ConIu
 * @author QuanND
 */

$(function () {
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
    $("a[href='#bot']").click(function() {
        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });

        return false;
    });
});