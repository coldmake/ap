<?php

class View {

    public $msg=false;
    
    function __construct() {
        //echo 'this is the view <br />';
    }

    public function render($name, $noInclude = false) {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header_1.php';
            require 'views/' . $name . '.php';
            //require 'views/footer.php';
        }
    }
}

?>
