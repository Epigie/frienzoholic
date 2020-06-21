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
    $followers=Followers::getFollowers($user_id,1);
    $follows=Followers::getFollows($user_id,1);
?>
<ul class="list-group fade" id="followers">
    <li class="list-group-item bg-yellow">
        <h5 class="m-0 p-0">Follows <small>(Showing recent..)</small></h5>
    </li>
    <?php
        foreach($follows as $follower){
            $profile_pic=Users::getProfilePic($follower['id']);
            $person_followers=Followers::getFollowersNo($follower['id']);
            ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm-3">
                <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="" class="icon">
            </div>
            <div class="col-sm-9">
                <a href="profile.php?username=<?php echo $follower['username'] ?>">
                    <b class="text-dark"><?php echo $follower['username'] ?></b><br>
                    <small class="text-muted"><?php echo $person_followers; ?> followers</small>
                </a>
            </div>
        </div>
    </li>
    <?php
}
?>
</ul>
<ul class="list-group mt-3 fade" id="followers">
    <li class="list-group-item bg-yellow">
        <h5 class="m-0 p-0">Followers <small>(Showing recent..)</small></h5>
    </li>
    <?php
        foreach($followers as $follower){
            $profile_pic=Users::getProfilePic($follower['id']);
            $person_followers=Followers::getFollowersNo($follower['id']);
            ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm-3">
                <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="" class="icon">
            </div>
            <div class="col-sm-9">
                <a href="profile.php?username=<?php echo $follower['username'] ?>">
                    <b class="text-dark"><?php echo $follower['username'] ?></b><br>
                    <small class="text-muted"><?php echo $person_followers; ?> followers</small>
                </a>
            </div>
        </div>
    </li>
    <?php
}
?>
</ul>
