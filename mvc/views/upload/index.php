<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/reset.css">
            <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/gg.css">
                <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/hr.css">
                    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/styles/form.css">
                        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/upload/styles/upload.css">
                            <!--jQuery-->
                            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
                            <script src="<?php echo URL; ?>public/js/setupFormInput.js" type="text/javascript" charset="utf-8"></script>
                            <script src="<?php echo URL_VIEWS; ?>upload/js/upload.js" type="text/javascript" charset="utf-8"></script>
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
                            <title>upload</title>
                            </head>
                            <body>
                                <a id = "logo" href="<?php echo URL; ?>">
                                    <img src="<?php echo URL; ?>public/images/logo.png"/>
                                </a>
                                <p id="heading">Upload Image</p>
                                <hr>
                                    <form id="UploadForm" class="Form FancyForm AuthForm" action="upload/run" method="POST" enctype="multipart/form-data">
                                        <ul>
                                            <li>
                                                Image format: "jpg","jpeg", "png" or "gif".
                                            </li>
                                            <li>
                                                Image size must be less than 3MB.
                                            </li>
                                            <li>
                                                <input type="file" name="file" id="file" />
                                            </li>
                                            <li>
                                                <input id="title" name="title" type="text" value="">
                                                    <label id="title">Title</label>
                                                    <span class="fff"></span>
                                            </li>
                                            <div style="display:none"><input type="hidden" name="csrfmiddlewaretoken" value="31c26a83821f75b3576968fcd27c8d5d"></div>
                                        </ul>

                                        <div id="buttonsContainer">
                                            <button type="submit">Upload</button>
                                            <button type="button" onclick="window.location = '<?php echo URL; ?>dashboard'">Cancel</button>
                                        </div>
                                    </form>
                            </body>
                            </html>