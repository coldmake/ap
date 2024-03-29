$(document).ready(function() {
    // set up the like button
    $('.likeButton').live('click', function() {
        if (loggedIn==true) {
            $image_id = $(this).parent().parent().find('.PinImageImg').attr('alt');
            $requestData = 'image_id=' + $image_id + '&like=' ;
            $likeCount = parseInt($(this).parent().parent().find('.likeCount').html());
            $(this).toggleClass('likeButtonDown');
            if ($(this).html() == 'like') {
                // change the content of the button to unlike
                $(this).html('unlike');
                // send content to server
                $.post(URL + 'all/like', $requestData + '1', function() {
                    //alert('You like it!');
                    });
                // update the like count
                $(this).parent().parent().find('.likeCount').html($likeCount + 1);
            }
            else {
                // change the content of the button to like
                $(this).html('like');
                // send content to server
                $.post(URL + 'all/like', $requestData + '-1', function() {
                    //alert('You unlike it!');
                    });
                // update the like count
                $(this).parent().parent().find('.likeCount').html($likeCount - 1);

            }
        } else {
            alert("Please log in first :)");
        }
    });

    // set up the comment button
    $('.commentButton').live('click', function() {
        $comment = $(this).parent().find('textarea').val();
        if ($comment !== "") {
            $image_id = $(this).parent().parent().parent().parent().find('.PinImageImg').attr('alt');
            $requestData = 'image_id=' + $image_id + '&comment=' + $comment;
            //console.log($(this).parent().find('textarea').serialize());
            $.post(URL + 'all/comment', $requestData, function(data) {
                //alert(data);
            });
            // define comment
            $commentSection = '\
                    <div class="comment">\
                        <a class="ImgLink">\
                            <img src="' + URL + 'public/images/avatar.jpg">\
                        </a>\
                        <p class="NoImage">\
                            <a class="userName">' + user_name + '</a> ' + $comment + '\
                        </p>\
                    </div>';

            // append the comment after all other comments
            $(this).parent().parent().parent().parent().find('.otherComments').append($commentSection);
            // clear the textarea
            $(this).parent().find('textarea').val('Add a comment...');
            setupBlocks();
        }
    });

    // set up the share button
    $('.shareButton').live('click', function() {
        if (fb_loggedIN != true) {
            alert('Please log in with your facebook first!');
        } else {
            var imageURL = $(this).parent().parent().find('.bigImgLink').attr('href');
            graphStreamPublish(imageURL);
        }
    });
});