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
        <link href="<?php echo URL_VIEWS; ?>all/styles/all.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupBlocks.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/scrollToTop.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/waypoints.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/stickyNavBar.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/infiniteScroll.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/setupSocialButtons.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/lightbox.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/addOneBlock.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/fb.js"></script>
        <script type="text/javascript" src="<?php echo URL_VIEWS; ?>popular/js/addPopularBlocks.js"></script>
        <?php require dirname(__FILE__).'/../../public/defineGlobalVariable.php'; ?>
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
                            <?php if (Session::get('loggedIn') == true): ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>popular/logout">Logout</a>
                            <?php else: ?>
                                <a class="nav loginNav" href="<?php echo URL; ?>login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <div id="search" >
                        <form class="text" method="get" action="/search/">
                            <input id="query" class="ui-autocomplete-input" type="text" placeholder="Search" value="" size="27" name="q" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"/>
                            <a id="query_button" class="lg" href="#">
                                <img alt="" src="<?php echo URL_VIEWS; ?>all/images/search.gif"/>
                            </a>
                        </form>
                    </div><!-- end of search -->
                </div><!-- end of headerContainer -->
            </div><!-- end of header -->
            <div id="navigation-holder" >
                <nav id="navigation">
                    <ul class="liquidContainer headerContainer">
                        <li>
                            <a href="<?php echo URL; ?>all" class="nav">
                                All
                            </a>&nbsp;&middot;
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>popular" class="nav">
                                Popular
                            </a>&nbsp;&middot;
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>warcraft" class="nav">
                                Warcraft
                            </a>&nbsp;&middot;
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>starcraft" class="nav">
                                Starcraft
                            </a>&nbsp;&middot;
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>diablo" class="nav">
                                Diablo
                            </a>
                        </li>
                    </ul>
                    <?php if (Session::get('loggedIn') == true)
                    {
                        echo '<div id="greeting">Hello, <a id="user_name" href="'.URL.'dashboard">'.Session::get('user_name').'</a></div>';
                    }
                    ?>
                </nav>
            </div>

            <div id="bodyContainer">

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
