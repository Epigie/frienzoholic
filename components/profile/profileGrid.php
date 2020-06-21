<?php
    include_once '../../classes/Posts.php';
    include_once '../../classes/Users.php';
    include_once '../../classes/Followers.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    if(isset($_GET['user_id'])){
        $target_id=$_GET['user_id'];
        $username=Users::getUsername($target_id);
        $details=Users::getUser($username);
        $Follows=Followers::getFollowsNo($target_id);
        $Followers=Followers::getFollowersNo($target_id);
        $Posts=Posts::getPostsNo($target_id);
    }
    $target_id=$_GET['target_id'] ?? 10;
    $posts=Posts::getPosts($target_id,1);
    if(Users::isPublic($target_id))
        $show=1;
    else{
        if(Followers::ifFollows($user_id,$target_id)){
            $show=1;
        }
        else if($user_id==$target_id){
            $show=1;
        }
        else {
            $show=0;
        }
    }
    if($show){
        include '../profile/sideBarTop.php';
?>
<div class="photoGrid fade">
    <?php
        foreach ($posts as $post) {
                ?>
                <img class="viewPost" post_id="<?php echo $post['post_id']; ?>" src="../images/uploads/<?php echo $post['image_url'] ?>" alt="">
                <?php
        }
    ?>
</div>
<script>
        $("#profileGrid").addClass("bg-yellow");
</script>
<?php }
else{
    echo "<p class='m-4'><b>Private Account</b> You should follow him to see his photos...</p>";
}
?>
