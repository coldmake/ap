$(function() {

    $.getJSON('all/loading/0', function(data) {
        var $data = $(data);

        for (var i=0;i<data.length;i++) {

            addOneBlock(data[i]);

        }
    });

    wait(1);

});


