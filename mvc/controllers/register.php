<?php

class Register extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('register/index');
    }

    public function run() {
        $error = $this->model->run();
        if ($error == false) {
            header('location: ../register');
        } else {
            header('location: ../login');
        }
    }

}
