<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Gamimag</title>
        <link href="<?php echo URL; ?>public/styles/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/gg.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/header.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/scrollToTop.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_VIEWS; ?>profile/styles/profile.css" rel="stylesheet" type="text/css" />
        </style>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/scrollToTop.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/waypoints.js"></script>
        <script type="text/javascript" src="<?php echo URL_VIEWS; ?>profile/js/profile.js"></script>
        <?php require dirname(__FILE__) . '/../../public/defineGlobalVariable.php'; ?>
    </head>

    <body id="categoriesBarPage" class="extraScroll">
        <div id="container">
            <div id="header">
                <div class="liquidContainer headerContainer">
                    <a id="logo" href="<?php echo URL; ?>">
                        <img src="<?php echo URL; ?>public/images/logo.png"/>
                    </a>
                    <ul id="headerNav">
                        <li>
                            <a class="nav aboutNav" href="<?php echo URL; ?>about">About</a>
                        </li>
                        <li>
                            <?php if (Session::get('loggedIn') == true): ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>dashboard/logout">Logout</a>
                            <?php else: ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div><!-- end of headerContainer -->
            </div><!-- end of header -->
            <div class="profilebox">
                <a class="cancelButton" href="<?php echo URL; ?>dashboard">
                    <img src="<?php echo URL; ?>public/images/close.png"/>
                </a>
                <form id="profileForm" action="profile/save" method="post" name="EditProfile" class="details-form">
                    <div class="left_div">
                        <label id="email_label" class="labelusual">Email</label>
                        <input type="text" name="email" id="email" class="textboxusual">

                        <label for="gender" class="labelusual">Gender</label>
                        <select name="gender" id="gender" class="textboxusual">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Not Specified">Not Specified</option>
                        </select>
                    </div><!-- end of left_div -->
                    <div class="right_div">
                        <div id="loader" style="display: none;"></div>
                        <div id="user-picture" ></div>
                        <label for="name" class="name_label" >Name</label>
                        <input type="text" name="name" id="name" class="textboxusual name">
                    </div><!-- end of right div -->
                    <button name="saveButton" type="submit" value="Save" class="saveButton" onclick="profileSaved()">Save</button>
                </form>
            </div><!-- end of profile box -->
        </div><!-- end of container -->
        <div id="fb-root"></div>
        <script type="text/javascript">
            var userPicture;
            var userName;
            window.fbAsyncInit = function() {
                FB.init({ appId: '297523203698283', //change the appId to your appId
                    status: true,
                    cookie: true,
                    xfbml: true,
                    oauth: true
                });
                showLoader(true);

                function updateButton(response) {
                    userPicture = document.getElementById('user-picture');
                    userName=document.getElementById('name');
                    if (response.authResponse) {
                        //user is already logged in and connected
                        FB.api('/me', function(info) {
                            login(response, info);
                        });
                    }
                }

                // run once with current status and whenever the status changes
                FB.getLoginStatus(updateButton);
                FB.Event.subscribe('auth.statusChange', updateButton);
            };

            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol
                    + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());

            function login(response, info){
                if (response.authResponse) {
                    var accessToken = response.authResponse.accessToken;
                    if (fb_loggedIN == 1) {
                        userPicture.innerHTML = '<img src="https://graph.facebook.com/' + info.id + '/picture?type=large" style="margin-left:100px;margin-top:50px">';
                        userName.innerHTML = info.name;
                    } else {
                        userPicture.innerHTML = '<img src="<?php echo URL; ?>public/images/avatar.jpg">';
                        userName.innerHTML = user_name;
                    }
                    showLoader(false);
                    //document.getElementById('other').style.display = "block";
                }
            }

            function logout(response){
                userPicture.innerHTML = "";
                userName.innerHTML = "";
                document.getElementById('debug').innerHTML = "";
                showLoader(false);
            }

            function showLoader(status){
                if (status)
                    document.getElementById('loader').style.display = 'block';
                else
                    document.getElementById('loader').style.display = 'none';
            }
        </script>
    </body>
</html>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30798200-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>