var maxNoOfComments = 3;

function addOneBlock(oneData) {
    $comment = '<div class="otherComments">';
    if (oneData.comment.length <= maxNoOfComments) {
        for (var j=0;j<oneData.comment.length;j++) {
            $comment += '\
                <div class="comment">\
                    <a class="ImgLink">\
                        <img src="' + URL + 'public/images/avatar.jpg">\
                    </a>\
                    <p class="NoImage">\
                        <a class="userName">' + oneData.comment[j].user_name + '</a> ' +
                        oneData.comment[j].comment_content + '\
                    </p>\
                </div>';
        }
        $comment += '</div>';
    } else {
        for (var j=0;j<maxNoOfComments;j++) {
            $comment += '\
                <div class="comment">\
                    <a class="ImgLink">\
                        <img src="' + URL + 'public/images/avatar.jpg">\
                    </a>\
                    <p class="NoImage">\
                        <a class="userName">' + oneData.comment[j].user_name + '</a> ' +
                        oneData.comment[j].comment_content + '\
                    </p>\
                </div>';
        }
        $comment += '</div><div class="commentMore">more comments</div>';
    }

    if (loggedIn == 1) {
        if (oneData.liked == '0') {
            $likeButtonStatement = '<button class="likeButton">like</button>';
        } else {
            $likeButtonStatement = '<button class="likeButton likeButtonDown">unlike</button>';
        }

        $commentSection = '\
            <div class="convo attribution clearfix">' +
                $comment + '\
                <div class="comment writeComment">\
                    <a class="ImgLink" href="">\
                        <img alt="Profile picture of you" src="' + URL + 'public/images/avatar.jpg">\
                    </a>\
                    <form method="POST" action="">\
                        <textarea class="gridComment" placeholder="Add a comment..." maxlength="1000"></textarea>\
                        <button class="commentButton" type="button">Comment</button>\
                    </form>\
                </div>\
            </div>';
    } else {
        $commentSection = '<div class="convo attribution clearfix">' + $comment + '</div>';
        $likeButtonStatement = '<button class="likeButton">like</button>';
    }

    // append the block to ColumnContainer
    $('#ColumnContainer').append('\
        <div class="pin" style="display: none;">\
            <div class="buttons">\
                <a data-pin-config="above" data-pin-do="buttonPin" href="//pinterest.com/pin/create/button/?url='+ URL +'&media=' + URL_BIG + '/' + oneData.image_id + '.' + oneData.extension + '&description=Next%20stop%3A%20Pinterest!"><button class="pinButton">Pin</button></a><button class="shareButton">share</button>' + $likeButtonStatement + '\
            </div>\
            <div class="PinHolder">\
                <a href="' + URL_BIG + '/' + oneData.image_id + '.' + oneData.extension + '" rel="lightbox" class="ImgLink bigImgLink" title="' + oneData.title + '">\
                    <img alt="' + oneData.image_id + '" src="' + URL_THUMB + '/' + oneData.image_id + '.' + oneData.extension + '" class="PinImageImg" />\
                </a>\
            </div>\
            <p class="description">' + oneData.title + '</p>\
            <p class="status">\
                <span class="likeCount">' + oneData.like + '</span> like(s)\
            </p>' +
            $commentSection + '\
        </div>');

}
