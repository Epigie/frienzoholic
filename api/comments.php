<?php
    include '../classes/Comments.php';
    if(isset($_GET['comment'])){
        if(isset($_GET['post_id']) && isset($_GET['value'])){
            session_start();
            $message=$_GET['value'];
            $user_id=$_SESSION['user_id'];
            $post_id=$_GET['post_id'];
            Comments::putComment($user_id,$post_id,$message);
        }
    }
?>
