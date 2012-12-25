<?php

class Profile extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handlelogin();
        //$this->view->js =array('profile/js/default.js');
    }

    public function index() {
        //echo 'inside all index';
        $this->view->render('profile/index');
    }

    public function logout() {
        Session::destroy();
        header('location:' . URL . 'all');
        exit;
    }

    public function save() {
        Session::init();
        $data=array('user_name'=>$_POST['name'],'user_email'=>$_POST['email'],'user_id'=>Session::get('user_id'));
        $this->model->save($data);
        header('location: ../dashboard');
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