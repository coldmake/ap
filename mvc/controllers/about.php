<?php

class About extends Controller {

    public function __construct() {
        parent::__construct();
        //Auth::handlelogin();
        //$this->view->js =array('dashboard/js/default.js');
    }

    public function index() {
        //echo 'inside all index';
        $this->view->render('about/index');
    }

    public function logout() {
        Session::destroy();
        header('location:' . URL . 'all');
        exit;
    }

//    
//    function xhrInsert()
//    {
//        $this->model->xhrInsert();
//    }
//    
//    function xhrGetListings() {
//        $this->model->xhrGetListings();
//    }
//    
//    function xhrDeleteListing() {
//        
//        $this->model->xhrDeleteListing();
//    }
}

?>