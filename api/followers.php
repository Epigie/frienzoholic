<?php
    include '../classes/Users.php';
    include '../classes/Followers.php';
    if(isset($_GET['request'])){
        if(isset($_GET['accept'])){
            $target=$_GET['accept'];
            session_start();
            $user_id=$_SESSION['user_id'];
            Followers::acceptRequest($target,$user_id);
        }
    }
    if(isset($_GET['unfollow'])){
        if(isset($_GET['target_id'])){
            session_start();
            $user_id=$_SESSION['user_id'];
            $target_id=$_GET['target_id'];
            Followers::unfollow($user_id,$target_id);
            echo 1;
        }
    }
    if(isset($_GET['follow'])){
        session_start();
        $user_id=$_SESSION['user_id'];
        $target=$_GET['target'];
        if(!Followers::ifFollows($user_id,$target)){
            if(!Followers::ifRequested($user_id,$target)){
                Followers::follow($user_id,$target);
                if(Followers::ifFollows($user_id,$target)){
                    echo "following";
                }
                if(Followers::ifRequested($user_id,$target)){
                    echo "requested";
                }
            }
        }
        else{
            echo "Already following";
        }
    }
?>
