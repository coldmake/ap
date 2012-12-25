$(function() {

    $.getJSON('popular/loading', function(data) {
        var $data = $(data);

        for (var i=0;i<data.length;i++) {

            addOneBlock(data[i]);

        }
    });

    wait(1);

});
