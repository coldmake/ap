$(function() {
    startFB();
})

function startFB() {
    setTimeout('bootup()',1000);
}

function bootup() {
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol
            + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
}

window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({ appId: '297523203698283',
        status: true,
        cookie: true,
        xfbml: true,
        oauth: true
    });

   showLoader(true);

   function updateButton(response) {
        userPicture = document.getElementById('user-picture');
        if (response.authResponse) {
            //user is already logged in and connected
            FB.api('/me', function(info) {
                login(response, info);
            });
        } else {
            //user is not connected to your app or logged out
        }
    }

    // run once with current status and whenever the status changes
    FB.getLoginStatus(updateButton);
    FB.Event.subscribe('auth.statusChange', updateButton);
};

// Load the SDK's source Asynchronously
(function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

function login(response, info){
    if (response.authResponse) {
        var accessToken = response.authResponse.accessToken;
        showLoader(false);
    }
}

function logout(response){
    showLoader(false);
}

function showLoader(status){
    if (status)
        document.getElementById('loader').style.display = 'block';
    else
        document.getElementById('loader').style.display = 'none';
}

function graphStreamPublish($imagePath){
    FB.api('/me/feed', 'post',
        {
            message     : "I want to...",
            link        : 'http://www.movement12.com',
            picture     : $imagePath,
            name        : 'MOVEMENT WANT-TO',
            description : 'It is important that we all remember the ability to DREAM.'
    },
    function(response) {
        if (!response || response.error) {
            alert('Error in sharing this artwork to Facebook');
        } else {
            alert('You have successfuly shared this artwork to Facebook!');
        }
    });
}
