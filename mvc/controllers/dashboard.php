<?php

class Dashboard extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handlelogin();
        //$this->view->js =array('dashboard/js/default.js');
    }

    public function index() {
        //echo 'inside all index';
        $this->view->render('dashboard/index');
    }

    public function logout() {
        Session::destroy();
        header('location:' . URL . 'all');
        exit;
    }

    public function liked() {
        $this->model->liked();
    }

    public function uploaded() {
        $this->model->uploaded();
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