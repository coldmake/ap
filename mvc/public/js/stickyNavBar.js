$(document).ready(function() {
    $.waypoints.settings.scrollThrottle = 30;
    $('#navigation-holder').waypoint(function(event, direction) {
        $(this).toggleClass('sticky', direction === "down");
        // to prevent the event from bubbling up the DOM tree, preventing any parent handlers from being notified of the event
        event.stopPropagation();
    });
});
