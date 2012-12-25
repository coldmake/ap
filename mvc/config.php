<?php
//Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL','http://localhost/zm/mvc/');
define('URL_VIEWS',URL.'views/');
define('LIBS','libs/');

define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','gamimag');
define('DB_USER','root');
define('DB_PASS','');


define('ERROR_LOGIN','The email or the password is not correct @_@');
define('ERROR_REGISTER','The email has already been registered >_<');

//The sitewide hashkey, do not change this becasue it is used for passwords!
//This is for other hash keys..Not sure yet
define('HASH_GENERAL_KEY','gamimag');

//This is for database passwords only
define('HASH_PASSWORD_KEY','gg');
?>
