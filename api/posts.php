<?php
include_once '../classes/Likes.php';
include_once '../classes/Posts.php';
    if(isset($_GET['like'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $post_id=$_GET['post_id'];
        Likes::putLike($user_id,$post_id);
        echo Likes::getLikesNo($post_id);
    }
    if(isset($_GET['delete'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $post_id=$_GET['post_id'];
        Posts::deletePost($user_id,$post_id);
    }
?>
