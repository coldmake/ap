<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>dashboard</title>
        <?php $facebookid = 0; ?>
        <link href="<?php echo URL; ?>public/styles/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/gg.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/header.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/columnContainer.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/scrollToTop.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/loadingMore.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/lightbox.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_VIEWS; ?>dashboard/styles/dashboard.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupBlocks.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/scrollToTop.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/waypoints.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupSocialButtons.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/lightbox.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/addOneBlock.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/fb.js"></script>
        <script type="text/javascript" src="<?php echo URL_VIEWS; ?>dashboard/js/addDashboardBlocks.js"></script>
        <?php require dirname(__FILE__) . '/../../public/defineGlobalVariable.php'; ?>
    </head>

    <body id="categoriesBarPage" class="extraScroll">
        <!-- facebook integration -->
        <div id="loader" style="display:none"></div>
        <div id="fb-root"></div>
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
                            <a class="nav aboutNav" href="<?php echo URL; ?>upload">Post</a>
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

            <div id="bodyContainer">
                <div id="profileSection">
                    <div class="profilePanel">
                        <!-- displays the image filled by facebook -->
                        <div id="user-picture"></div>
                        <!-- displays the name filled by facebook -->
                        <div id="user-name"></div>
                    </div>

                    <!-- display the "Edit profile link"-->
                    <a id="editProfile" href="<?php echo URL; ?>profile">Edit Profile</a>
                </div>

                <hr>
                    <div id="wrapper" class="BoardLayout">
                        <div id="socialButtons">
                            <button id="uploadedButton">uploaded</button>
                            <button id="likedButton">liked</button>
                            <button id="uploadButton">upload</button>
                        </div>
                        <div id="ColumnContainer" style="margin-top: 9px;">
                        </div><!-- #ColumnContainer -->
                        <div id="more" style="display: none;">
                            <img alt="Pin Loader Image" src="<?php echo URL_VIEWS; ?>dashboard/images/bouncingLoader.gif">
                                <span>Loading More Content</span>
                        </div>
                        <div id="result"></div>
                    </div><!-- #wrapper -->
                    <a id="scrollToTop" class="button whiteButton indicator" type="button"></a>
            </div><!-- #bodyContainer -->
        </div>
        <!-- You don't have to care about this region, it not shown on the page-->
        <!-- This region is to handle facebook request, cannot be moved to a single js file-->
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
                    userName=document.getElementById('user-name');
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
                    if (fb_loggedIN==1) {
                        userPicture.innerHTML = '<img src="https://graph.facebook.com/' + info.id + '/picture?type=large">'+ "<br/>" ;
                        userName.innerHTML = info.name;
                    } else {
                        userPicture.innerHTML = '<img src="<?php echo URL; ?>public/images/avatar.jpg">'+ "<br/>" ;
                        userName.innerHTML = user_name;
                    }
                    $facebookid=info.id;
                    showLoader(false);
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
    </body>
</html>