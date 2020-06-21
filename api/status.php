<?php
        include '../classes/Status.php';
        session_start();
        $user_id=$_SESSION['user_id'];
        if(isset($_GET['deleteStatus'])){
            if(isset($_GET['status_id'])){
                if(Status::getStatusUserId($_GET['status_id']) == $user_id){
                    Status::deleteStatus($_GET['status_id']);
                    echo 1;
                }
            }
        }
?>
