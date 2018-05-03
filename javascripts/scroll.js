$(document).ready(function() {

    $(".links a").click(function() {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
            duration: 1500,
            easing: "swing"
        });
        return false;
    });

});