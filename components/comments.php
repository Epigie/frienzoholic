<?php
    include_once '../classes/Comments.php';
    include_once '../classes/Users.php';
    $post_id=$_GET['post_id'];
    $comments=Comments::getComments($post_id,1);
    foreach ($comments as $comment) {
        $username=Users::getUsername($comment['user_id']);
        $profile_pic=Users::getProfilePic($comment['user_id']);
        ?>
        <div class="list-group-item">
            <div class="row no-gutters fade">
                <div class="col-md-3 col-sm-3">
                    <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="" class="icon">
                </div>
                <div class="col-md-9 col-sm-9">
                    <a href="profile.php?user_id=<?php echo $comment['user_id']; ?>">
                        <b class="text-dark"><?php echo $username ?></b>
                    </a>
                    <p class="text-muted"><?php echo $comment['comment']; ?></p>
                </div>
            </div>
        </div>

        <?php
    }
?>
