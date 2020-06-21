<?php
    include '../classes/Messages.php';
    if(isset($_GET['sendMessage'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $target_id=$_GET['target_id'];
        $message=$_GET['message'];
        Messages::sendMessage($user_id,$target_id,$message);
        Messages::seeSendMessage($target_id,$user_id);
    }
    if(isset($_GET['seeMessage'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $target_id=$_GET['target_id'];
        Messages::seeMessage($target_id,$user_id);
    }
?>
