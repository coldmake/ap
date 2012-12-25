   window.fbAsyncInit = function() {
    FB.init({
      appId      : '388684847866272', // App ID
      channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
	var  profile    = document.getElementById('facebook_information'),
  showMe = function(response) {
    if (response.status !== 'connected') {
      profile.innerHTML = '<em>Not Connected</em>';
    } else {
      FB.api('/me', function(response) {
        var html = '<table>';
        for (var key in response) {
          html += (
            '<tr>' +
              '<th>' + key + '</th>' +
              '<td>' + response[key] + '</td>' +
            '</tr>'
          );
        }
        profile.innerHTML = html;
      });
    }
  };
FB.getLoginStatus(function(response) {
  showMe(response);
  FB.Event.subscribe('auth.authResponseChange', showMe);
});
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
