$(function() {

    $.getJSON('dashboard/uploaded', function(data) {
        var $data = $(data);
        for (var i=0;i<data.length;i++) {
            addOneBlock(data[i]);
        }
    });

    wait(1);

    //setup the uploaded button
    $('#uploadedButton').click(function() {
        $('#ColumnContainer').empty();
        $.getJSON('dashboard/uploaded', function(data) {
            var $data = $(data);
            for (var i=0;i<data.length;i++) {
                addOneBlock(data[i]);
            }
        });
        wait(1);
    });
    //set up the liked button
    $('#likedButton').click(function() {
        $('#ColumnContainer').empty();
        $.getJSON('dashboard/liked', function(data) {
            var $data = $(data);
            for (var i=0;i<data.length;i++) {
                addOneBlock(data[i]);
            }
        });
        wait(1);
    });
    //set up the upload button
    $('#uploadButton').click(function() {
        $(location).attr('href', URL + 'upload');
    });

});
