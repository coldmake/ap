// function to scroll to the top of the page
$(document).ready(function(){
    // force page scroll position to top at page refresh
    $("html, body").animate({ scrollTop: 0 }, 200);//I don't know why, it just works...
    // auto hide the scroll to top icon
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });
    // after click the button
    $('#scrollToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
