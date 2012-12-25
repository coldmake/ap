<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Gamimag</title>
        <link href="<?php echo URL; ?>public/styles/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/gg.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/header.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/navigation.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/columnContainer.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/scrollToTop.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/loadingMore.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL; ?>public/styles/lightbox.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL_VIEWS; ?>about/styles/about.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/scrollToTop.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/waypoints.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/infiniteScroll.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/lightbox.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/addOneBlock.js"></script>
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
                            <a class="nav aboutNav" href="<?php echo URL; ?>upload">Post</a>
                        </li>
                        <li>
                            <?php if (Session::get('loggedIn') == true): ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>all/logout">Logout</a>
                                <p>Hello, <?php echo Session::get('user_name') ?> : )</p>
                            <?php else: ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div><!-- end of headerContainer -->
            </div><!-- end of header -->
            <div id="bodyContainer">
                <div id="wrapper" class="BoardLayout">
                    <p>ALL you want to say appears here!!!!!!</p>
                    <div id="result"></div>
                </div><!-- #wrapper -->

                <a id="scrollToTop" class="button whiteButton indicator" type="button"></a>

            </div><!-- #bodyContainer -->
        </div>
    </body>
</html>
