<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Gamimag</title>
        <?php require dirname(__FILE__) . '/../../public/defineGlobalVariable.php'; ?>
        <link href="<?php echo URL; ?>public/styles/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/gg.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/header.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/navigation.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/columnContainer.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/scrollToTop.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/loadingMore.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/lightbox.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_VIEWS; ?>all/styles/all.css" rel="stylesheet" type="text/css" />
        <script src="//assets.pinterest.com/js/pinit.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_VIEWS; ?>all/js/banner.js"></script>
        <script type="text/javascript" src="<?php echo URL_VIEWS; ?>all/js/addAllBlocks.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupBlocks.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/scrollToTop.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/waypoints.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/stickyNavBar.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/infiniteScroll.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupSocialButtons.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/lightbox.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/addOneBlock.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/fb.js"></script>
    </head>
    <body id="categoriesBarPage" class="extraScroll">
        <!-- for fb integration -->
        <div id="loader" style="display: none;"></div>
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
                                <a class="nav loginNav" href="<?php echo URL; ?>all/logout">Logout</a>
                            <?php else: ?>
                                <a class="nav loginNav logOut" href="<?php echo URL; ?>login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div><!-- end of headerContainer -->
            </div><!-- end of header -->
            <div id="navigation-holder" >
                <nav id="navigation">
                    <ul class="liquidContainer headerContainer">
                        <li>
                            <a href="http://www.facebook.com/Movementwantto" class="nav">
                                It is important that we all remember the ability to DREAM.
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (Session::get('loggedIn') == true) {
                        echo '<div id="greeting">Hello, <a id="user_name" href="' . URL . 'dashboard">' . Session::get('user_name') . '</a></div>';
                    }
                    ?>
                </nav>
            </div>

            <div id="bodyContainer">
                <div id="banner">
                    <ul id="scroller">
                        <li><img src="<?php echo URL_VIEWS; ?>all/images/banner/1.jpg" width="800" height="300"></li>
						  <li><img src="<?php echo URL_VIEWS; ?>all/images/banner/1.jpg" width="800" height="300"></li>
						    <li><img src="<?php echo URL_VIEWS; ?>all/images/banner/1.jpg" width="800" height="300"></li>
                    </ul>
                </div>

                <div id="wrapper" class="BoardLayout">
                    <div id="ColumnContainer" style="margin-top: 49px;">
                    </div><!-- #ColumnContainer -->

                    <div id="more">
                        <img alt="Pin Loader Image" src="<?php echo URL_VIEWS; ?>all/images/bouncingLoader.gif">
                            <span>Loading More Content</span>
                    </div>

                    <div id="result"></div>
                </div><!-- #wrapper -->

                <a id="scrollToTop" class="button whiteButton indicator" type="button"></a>

            </div><!-- #bodyContainer -->
        </div>
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