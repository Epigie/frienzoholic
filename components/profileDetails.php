<?php
    include_once '../classes/Users.php';
    include_once '../classes/Followers.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $username=Users::getUsername($user_id);
    $profile_pic=Users::getProfilePic($user_id);
    $followers=Followers::getFollowersNo($user_id);
    $follows=Followers::getFollowsNo($user_id);
?>
<ul class="list-group fade" id="profileDetails">
    <li class="list-group-item p-0">
        <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="image" class="img-fluid">
        <p class="text-center mt-3"><b><?php echo $username; ?></b></p>
        <a href="profile.php?user_id=<?php echo $user_id ?>" class="text-center text-primary">
            <p>View your Profile</p>
        </a>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm-10">
                Followers
            </div>
            <div class="col-sm-2">
                <b><?php echo $followers ?></b>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm-10">
                Following
            </div>
            <div class="col-sm-2">
                <b><?php echo $follows ?></b>
            </div>
        </div>
    </li>
</ul>
