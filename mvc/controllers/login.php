<?php

class Login extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
    }

    public function index() {
        //echo 'inside login index';
        //echo 'email: aaa <br />password: bbb <br/>after encryption: ' . Hash::create('md5', 'bbb', HASH_PASSWORD_KEY) . '<br />';
        $this->view->render('login/index');
    }

    public function run() {
        $error = $this->model->run();
        if ($error == false) {
            header('location: ../all');
        } else {
            header('location: ../login');
        }
    }

    public function fbrun() {
        $this->model->fbrun();
        header('location: ../all');
    }

}
