<?php

class Auth {

    function __construct() {
        
    }

    public static function handlelogin() {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: login');
            exit;
        }
    }

}

?>
