<?php

class Warcraft extends Controller {

    public function __construct() {
        parent::__construct();
        //Auth::handlelogin();
        //$this->view->js =array('dashboard/js/default.js');
    }

    public function index() {
        //echo 'inside all index';
        $this->view->render('warcraft/index');
    }

    public function logout() {
        Session::destroy();
        header('location:' . URL . 'all');
        exit;
    }

    public function loading() {
        $this->model->loading();
    }

    public function like() {
        $data = array('image_id' => $_POST['image_id'], 'image_likes' => $_POST['like']);
        $this->model->like($data);
    }

    public function comment() {
        $data = array('image_id' => $_POST['image_id'], 'comment_content' => $_POST['comment']);
        $this->model->comment($data);
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