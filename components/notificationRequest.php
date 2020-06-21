<?php
    include_once '../classes/Notifications.php';
    include_once '../classes/Users.php';
    include_once '../classes/Followers.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $notif=Followers::getRequests($user_id,1);
    foreach ($notif as $noti) {
        $username=Users::getUsername($noti['user_id']);
        $profile_pic=Users::getProfilePic($noti['user_id']);
    ?>
    <div class="windowcontent border-bottom p-2 requestWindowGrid" user_id="<?php echo $noti['user_id'] ?>">
                <img src="../images/uploads/<?php echo $profile_pic ?>" class="Nicon" alt="">
                <small class="text-dark p-2"><b><?php echo $username ?></b></small>
                <div class="d-flex">
                    <button class="btn btn-light mr-2 allowButton">Allow</button>
                    <button class="btn btn-light deleteButton ml-2">Delete</button>
                </div>
    </div>
<?php
        }
?>
<script>
    $(".allowButton").click(
        function () {
            target=$(this).parent().parent().attr("user_id");
            $.get("../api/followers.php",{
                request:1,
                accept:target
            },function(data){
                $("#requestWindow").fadeToggle(300);
            });
        }
    );
</script>
