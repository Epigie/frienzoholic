<?php
    include_once '../classes/Notifications.php';
    include_once '../classes/Messages.php';
    include_once '../classes/Followers.php';
    if(isset($_GET['checkNotification'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        echo Notifications::getNotificationsNo($user_id);
    }
    if(isset($_GET['checkMessage'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        echo Messages::getNewMessageNo($user_id);
    }
    if(isset($_GET['checkRequest'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        echo Followers::getRequestNo($user_id);
    }
?>
