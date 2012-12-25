$(function() {
    var labelLeft = $('label').css('left');
    // auto hide the placeholder when focus
    $('input').focus(function() {
        $(this).parent().find('label').css('left', '-9999px');
    });

    // check whether the input alr has input
    delayCheck();

    $('input').blur(function() {
        if ($(this).val() == "") {
            $(this).parent().find('label').css('left', labelLeft);
        }
    });

    // click on the label will also enable the user to input
    $('label').click(function() {
        $(this).css('left','-9999px');
        $(this).parent().find('input').focus();
    });
})

function checkFormInput() {
    $('input').each(function() {
        if ($(this).val() !== '') {
            $(this).parent().find('label').css('left', '-9999px');
        }
    });
}

function delayCheck() {
    setTimeout("checkFormInput()", 200);
}
