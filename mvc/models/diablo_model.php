<?php

class Diablo_Model extends Model {

//Session::get--> to be completed
    public function __construct() {
        parent::__construct();
    }
    //Session to be handled
    public function loading() {
        Session::init();
        for ($i = 1; $i <= 24; $i++) {
            $id = rand(1, 17);
            $comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = :image_id', array(':image_id' => $id));
            //$comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = 1');
            $ext = $this->db->select('SELECT image_path,image_title,image_likes FROM gg_image WHERE image_id = :image_id', array(':image_id' => $id));
            $liked = 0;
            if (isset($_SESSION['user_id'])) {
                $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
                $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $id));
                $count = $sth->rowCount();
                if ($count != 0) {
                    $liked = 1;
                }
            }

            $data = array('image_id' => $id, 'title' => $ext[0]['image_title'], 'extension' => $ext[0]['image_path'], 'like' => $ext[0]['image_likes'], 'liked' => $liked, 'comment' => $comment);
            $image[] = $data;
        }
        echo json_encode($image);
    }

    //Session to be handled
    public function like($data) {
        Session::init();
        //Session::get--> to be completed
        if ($data['image_likes'] == '1') {
            $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
            $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $data['image_id']));
            $count = $sth->rowCount();
            if ($count == 0) {
                $dt = $this->db->select('SELECT image_likes FROM gg_image WHERE image_id = :image_id', array(':image_id' => $data['image_id']));
                $likeNo = $dt[0]['image_likes'] + 1;
                $this->db->update('gg_image', array('image_likes' => $likeNo, 'image_id' => $data['image_id']), 'image_id=:image_id');

                $insertData = array('user_id' => $_SESSION['user_id'], 'image_id' => $data['image_id']);
                $this->db->insert('gg_like', $insertData);
            }
        } else {
            $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
            $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $data['image_id']));
            $count = $sth->rowCount();
            if ($count != 0) {
                $dt = $this->db->select('SELECT image_likes FROM gg_image WHERE image_id = :image_id', array(':image_id' => $data['image_id']));
                $likeNo = $dt[0]['image_likes'] - 1;
                $this->db->update('gg_image', array('image_likes' => $likeNo, 'image_id' => $data['image_id']), 'image_id=:image_id');

                $sth = $this->db->prepare("DELETE * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
                $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $data['image_id']));
            }
        }

        echo json_encode($data);
    }

    //Session to be handled
    public function comment($data) {
        Session::init();

        $insertData = array('user_id' => $_SESSION['user_id'], 'image_id' => $data['image_id'], 'comment_content' => $data['comment_content']);
        $this->db->insert('gg_comment', $insertData);

        echo json_encode($data);
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
