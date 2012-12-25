<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //No. of images to be handled
    //Session to be handled
    public function liked() {
        Session::init();
        
        $image_list = $this->db->select('SELECT image_id FROM gg_like WHERE user_id = :user_id ', array(':user_id' => $_SESSION['user_id'])); 
        $image='';
        foreach ($image_list as $key => $id) {
            $comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = :image_id', array(':image_id' => $id['image_id']));
            //$comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = 1');
            $ext = $this->db->select('SELECT image_path,image_title,image_likes FROM gg_image WHERE image_id = :image_id', array(':image_id' => $id['image_id']));
            $liked = 0;
            if (isset($_SESSION['user_id'])) {
                $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
                $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $id['image_id']));
                $count = $sth->rowCount();
                if ($count != 0) {
                    $liked = 1;
                }
            }

            $data = array('image_id' => $id['image_id'], 'title' => $ext[0]['image_title'], 'extension' => $ext[0]['image_path'], 'like' => $ext[0]['image_likes'], 'liked' => $liked, 'comment' => $comment);
            $image[] = $data;
        }
        echo json_encode($image);
    }
    
    //No. of images to be handled
    //Session to be handled
    public function uploaded() {
         Session::init();
        
        $image_list = $this->db->select('SELECT image_id FROM gg_image WHERE user_id = :user_id ', array(':user_id' => $_SESSION['user_id'])); 
        $image='';
        foreach ($image_list as $key => $id) {
            $comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = :image_id', array(':image_id' => $id['image_id']));
            //$comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = 1');
            $ext = $this->db->select('SELECT image_path,image_title,image_likes FROM gg_image WHERE image_id = :image_id', array(':image_id' => $id['image_id']));
            $liked = 0;
            if (isset($_SESSION['user_id'])) {
                $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
                $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $id['image_id']));
                $count = $sth->rowCount();
                if ($count != 0) {
                    $liked = 1;
                }
            }

            $data = array('image_id' => $id['image_id'], 'title' => $ext[0]['image_title'], 'extension' => $ext[0]['image_path'], 'like' => $ext[0]['image_likes'], 'liked' => $liked, 'comment' => $comment);
            $image[] = $data;
        }
        echo json_encode($image);
    }

//    function xhrInsert() {
//        $text = $_POST['text'];
//        $this->db->insert('data',array('text'=>$text));
////        $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
////        $sth->execute(array(':text' => $text));
//
//        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
//
//        echo json_encode($data);
//    }
//
//    function xhrGetListings() {
//        
//        $data=$this->db->select('SELECT * FROM data');
////        $sth = $this->db->prepare('SELECT * FROM data');
////        $sth->setFetchMode(PDO::FETCH_ASSOC);
////        $sth->execute();
////        $data = $sth->fetchAll();
//        echo json_encode($data);
//    }
//
//    function xhrDeleteListing() {
//         $id=(int) $_POST['id'];
//         $this->db->delete('data',"id=$id");
////         $sth = $this->db->prepare('DELETE FROM data WHERE id ="'.$id.'"');
////         $sth->execute();
//    }
//
}

?>