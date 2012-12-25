<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
        //echo 'Login model';
        //echo md5('bbb');
    }

    public function run() {

        $sth = $this->db->prepare("SELECT user_id,user_name FROM gg_user WHERE
            user_email= :email AND user_password= :password");
        $sth->execute(array(
            ':email' => $_POST['email'],
            ':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();
        //$data = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            //login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user_id', $data['user_id']);
            Session::set('user_name', $data['user_name']);
            Session::set('fb_loggedIN', false);
            unset($_SESSION['error_login']);
            unset($_SESSION['error_register']);
            return false;
        } else {
            //show an error
            Session::init();
            Session::set('error_login', ERROR_LOGIN);
            return true;
        }
        //print_r($data);
        }

        public function fbrun() {

        $facebook = new Facebook(array(
                   'appId' => '297523203698283',
                   'secret' => '56b3c0b70b6e5ab271b41a86295f9f66',
                ));

// See if there is a user from a cookie
         $user = $facebook->getUser();

        if ($user)   {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
            } catch (FacebookApiException $e) {
                echo '<pre>' . htmlspecialchars(print_r($e, true)) . '</pre>';
                $user = null;
            }
        }
        //print_r($user_profile);

        $sth = $this->db->prepare("SELECT user_id,user_name FROM gg_user WHERE
            user_authid= :authid");
        $sth->execute(array(
            ':authid' => $user_profile['id']
        ));

        $data = $sth->fetch();
        $count = $sth->rowCount();
        if ($count == 0) {
            $this->db->insert('gg_user', array(
               'user_authid' =>$user_profile['id'], 'user_provider'=>'facebook', 'user_email' => $user_profile['email'], 'user_name' => $user_profile['name'], 'user_password' => Hash::create('md5', $user_profile['id'], HASH_PASSWORD_KEY)));
            $data['user_id'] = $this->db->lastInsertId();
            $data['user_name'] = $user_profile['name'];
        }
        Session::init();
        Session::set('loggedIn', true);
        Session::set('user_id', $data['user_id']);
        Session::set('user_name', $data['user_name']);
        Session::set('fb_loggedIN', true);
        unset($_SESSION['error_login']);
    }

}

?>
