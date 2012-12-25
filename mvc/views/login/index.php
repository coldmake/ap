<?php
  include_once "fbconfig.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/gg.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/hr.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/login/styles/login.css">
        <!--jQuery-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo URL; ?>public/js/setupFormInput.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo URL; ?>views/login/js/login.js" type="text/javascript" charset="utf-8"></script>
        <title>login</title>
    </head>
    <body>
        <a id = "logo" href="<?php echo URL; ?>">
            <img src="<?php echo URL; ?>public/images/logo.png"/>
        </a>
        <div class="social_buttons">
            <div class="inset">
                <?php if (Session::get('loggedIn') != true) { ?>
                    <a href="<?= $loginUrl ?>">
                        <img src="<?php echo URL; ?>views/login/images/login-facebook.gif" alt="Facebook Login" >
                    </a>
                <?php } else { ?>
                    <a href="<?php echo URL; ?>">
                    <img src="<?php echo URL; ?>views/login/images/login-facebook.gif" >
                    </a>
                <?php } ?>
            </div>
        </div>
        <hr>
        <form id="AuthForm" class="Form FancyForm AuthForm" action="login/run" method="POST" accept-charset="utf-8">
            <ul>
                <li>
                    <input id="id_email" name="email" type="text" value="">
                    <label id="email_label">Email</label>
                    <span class="fff"></span>
                </li>
                <li>
                    <input id="id_password" name="password" type="password" value="">
                    <label id="password_label">Password</label>
                    <span class="fff"></span>
                </li>
            </ul>
            <div style="color:red">
                <?php
                if (isset($_SESSION['error_login']))
                    echo $_SESSION['error_login'] . '<br />';
                unset($_SESSION['error_login']);
                ?>
            </div>
            <a id="resetPassword" class="colorless" href="/password/reset/">Forgot your password?</a>
            <div id="buttonsContainer">
                <button id="loginButton" type="submit">Login</button>
                <button id="registerButton" type="submit" formaction="register">Register</button>
            </div>
        </form>
        <div id="fb-root"></div>
        <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
        <script type="text/javascript">
            FB.init({
                appId  : '<?= $fbconfig['appid'] ?>',
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
                xfbml  : true  // parse XFBML
            });
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