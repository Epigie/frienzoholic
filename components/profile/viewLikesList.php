<?php
    include_once '../../classes/Likes.php';
    include_once '../../classes/Users.php';
    $post_id=$_GET['post_id'];
    $likes=Likes::getLikes($post_id,1);
    foreach ($likes as $like) {
        $username=Users::getUsername($like['user_id']);
        $profile_pic=Users::getProfilePic($like['user_id']);
        ?>
        <div class="list-group-item">
            <div class="row no-gutters fade align-items-center">
                <div class="col-md-3 col-sm-3">
                    <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="" class="icon">
                </div>
                <div class="col-md-9 col-sm-9">
                    <a href="profile.php?user_id=<?php echo $like['user_id']; ?>">
                        <b class="text-dark"><?php echo $username ?></b>
                    </a>
                </div>
            </div>
        </div>

        <?php
    }
?>
