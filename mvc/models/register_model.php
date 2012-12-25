<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {

        $sth = $this->db->prepare("SELECT * FROM gg_user WHERE 
            user_email= :email");
        $sth->execute(array(':email' => $_POST['email']));

        $count = $sth->rowCount();
        if ($count == 0) {
            //login
            $this->db->insert('gg_user', array(
                'user_email' => $_POST['email'], 'user_name' => $_POST['name'], 'user_password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)));
            Session::init();
            unset($_SESSION['error_register']);
            return true;
        } else {
            //show an error
            Session::init();
            Session::set('error_register', ERROR_REGISTER);
            return false;
        }
        //print_r($data);
    }
}

?>
