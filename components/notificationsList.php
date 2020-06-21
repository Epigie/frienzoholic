<?php
    include_once '../classes/Notifications.php';
    include_once '../classes/Users.php';
    include_once '../classes/Posts.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $notif=Notifications::getNotifications($user_id,1);
    Notifications::seeNotifications($user_id);
    foreach ($notif as $noti) {
        if($noti['type'] == 'follow'){
            $file=Users::getProfilePic($noti['target_id']);
        }
        if($noti['type'] == 'post'){
            $file=Posts::getImage($noti['target_id']);
        }
    ?>
<div class="windowcontent border-bottom d-flex align-items-center p-2">
    <img src="../images/uploads/<?php echo $file; ?>" class="Nicon" alt="">
    <small class="text-dark p-2"><?php echo $noti['notification'] ?></small>
</div>

<?php
        }
?>
