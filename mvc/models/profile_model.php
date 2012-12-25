<?php

class Profile_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //No. of images to be handled
    //Session to be handled
    public function save($data) {
        Session::init();
        $this->db->update('gg_user', $data, 'user_id=:user_id');
        Session::set('user_name', $data['user_name']);
    }

}

?>