<?php


require 'config.php';
require 'util/Auth.php';
//Use an autoloader
//spl_autoload_register (Take a look at it)
function __autoload($class){
    require LIBS.$class.'.php';
}

$app=new Bootstrap();

?>
