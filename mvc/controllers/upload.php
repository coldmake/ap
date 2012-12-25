<?php

class Upload extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handlelogin();
    }

    public function index() {
        $this->view->render('upload/index');
    }

    public function run() {
        $this->model->run();
        
        
        
/*
        $error = $this->model->run();
        if ($error == false) {
            header('location: ../all');
        } else {
            header('location: ../login');
        }*/
    }

}