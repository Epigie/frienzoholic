<?php include '../profile/sideBarTop.php'; ?>
<?php
    include_once '../../classes/Users.php';
    include_once '../../classes/Followers.php';
    $target_id=$_GET['target_id'];
    $follows=Followers::getFollows($target_id,1);
?>
<ul class="list-group fade p-3" id="followers">
    <li class="list-group-item bg-yellow">
        <h5 class="m-0 p-0">Follows <small>(Showing Recent)</small></h5>
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
<script>
        $("#followingList").addClass("bg-yellow");
</script>
