<?php
    include_once '../classes/Notifications.php';
    include_once '../classes/Users.php';
    include_once '../classes/Messages.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $notif=Messages::getNewMessages($user_id,);
    foreach ($notif as $noti) {
        $image=Users::getProfilePic($noti['from_user_id']);
        $username=Users::getUsername($noti['from_user_id']);
    ?>
<div class="windowcontent border-bottom d-flex align-items-center p-2">
    <img src="../images/uploads/<?php echo $image; ?>" class="Nicon" alt="">
    <small class="text-dark p-2"><?php echo $username?> sent a message</small>
</div>

<?php
        }
?>
<div>
        <a href="/frienzoholic/pages/message.php" class="text-center bg-blue text-white d-flex justify-content-center p-2"><small>See all messages</small></a>
</div>
