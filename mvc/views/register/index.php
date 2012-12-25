<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/gg.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/hr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/register/styles/register.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--jQuery-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="<?php echo URL; ?>views/register/js/register.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo URL; ?>public/js/setupFormInput.js" type="text/javascript" charset="utf-8"></script>
    <title>register</title>
    </head>

    <body>
        <h1 id = "logo">
            <a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/images/logo.png"/></a>
        </h1>
        <hr>
        <form id="AuthForm" class="Form FancyForm AuthForm" action="register/run" method="POST" accept-charset="utf-8">
            <ul>
                <li>
                    <input id="id_email" name="email" type="text" value="" oninput="onEmailchange()">
                        <label id="email_lable">Email</label>
                        <span class="fff"></span>
                </li>
                <li>
                    <input id="id_password" name="password" type="password" value="" oninput="onPasschange()">
                        <label id="password_lable">Password</label>
                        <span class="fff"></span>
                </li>
                <li>
                    <input id="id_prefname" name="name" type="text" value="" oninput="onPrefname()">
                        <label id="prefname_lable">Preferred&nbsp;name</label>
                        <span class="fff"></span>
                </li>
            </ul>
            <div style="color:red">
                <?php
                if (isset($_SESSION['error_register']))
                    echo $_SESSION['error_register'].'<br />';
                unset($_SESSION['error_register']);
                ?>
            </div>
            <div id="buttonsContainer">
                <button id="submitButton" type="submit">Submit</button>
            </div>
        </form>
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