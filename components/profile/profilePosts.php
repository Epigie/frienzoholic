<?php
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $target_id=$_GET['target_id'];
    if($user_id==$target_id)
        $delete=1;
    else
        $delete=0;
    $page=(isset($_GET['page'])) ? $_GET['page'] : 1;
    include_once '../../classes/Users.php';
    include_once '../../classes/Followers.php';
    include_once '../../classes/Posts.php';
    include_once '../../classes/Likes.php';
    include_once '../../classes/Comments.php';
    $posts=Posts::getPosts($target_id,$page);
    $username=Users::getUsername($target_id);
    $profile_pic=Users::getProfilePic($target_id);
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
        foreach ($posts as $post) {
            $ifliked=Likes::ifLiked($user_id,$post['post_id']);
            if($ifliked)
                $liked="button liked";
            else{
                $liked="button";
            }
            $likes=Likes::getLikesNo($post['post_id']);
            $comments=Comments::getCommentsNo($post['post_id']);
?>
<div class="col-md-6 col-sm-12">
    <div class="card m-3 fade"  post_id="<?php echo $post['post_id']; ?>">
        <div class="top_card m-3">
          <div class="row no-gutters align-items-center">
              <div class="col-sm-3 center">
                  <img class="icon" src="../images/uploads/<?php echo $profile_pic; ?>" alt="">
              </div>
              <div class="col-sm-7">
                  <a href="" class="text-blue">
                      <b class="ml-2"><?php echo $username; ?></b>
                  </a>
              </div>
              <div class="col-sm-2 center">
                  <?php if($delete){
                        ?>
                        <button class="btn btn-light deletePost" post_id="<?php echo $post['post_id']; ?>">
                                <i class="fa fa-times">    </i>
                        </button>

                        <?php
                    }
                ?>
              </div>
          </div>
        </div>
        <p class="mt-0 mx-4 mb-3"><?php echo $post['description']; ?></p>
        <img class="img-fluid viewPost" post_id="<?php echo $post['post_id']; ?>" src="../images/uploads/<?php echo $post['image_url']; ?>" alt="">
        <div class="buttons m-3 d-flex">
            <button class="<?php echo $liked; ?> likeButton d-flex align-items-center"> <i class="fa fa-heart mr-2"></i> Like <span class="ml-2"><?php echo $likes; ?></span></button>
              <button class="button ml-2 d-flex align-items-center"> <i class="fa fa-comments mr-1"></i> Comments <span class="ml-2"><?php echo $comments; ?></span></button>
        </div>
    </div>
</div>
<?php
    }
}
else{
    echo "
    <div class='col-sm-12 center'>
            <p class='text-center'>This account is private, You should follow to see posts</p>
    </div>
    ";
}

?>
<script>
    $(".likeButton").click(
        function () {
            button=$(this);
            post_id=$(this).parent().parent().attr("post_id");
            $.get("../api/posts.php",{
                like:1,
                post_id
            },function (data) {
                $(button).html(`
                        <i class="fa fa-heart mr-2"></i> Like <span class="ml-2" id="#likeText">${data}</span>
                `);
            });
            $(this).toggleClass("liked");
        }
    );
    $(".deletePost").click(
        function () {
            $.get("../api/posts.php",{
                delete:1,
                post_id:$(this).attr("post_id")
            },function (data) {
                $.get("../components/profile/profileGrid.php",{
                    target_id:target_id
                },function (data) {
                    $(".photos").html(data);
                });
                $.get("../components/profile/profilePosts.php",{
                    target_id
                },function (data) {
                    $("#posts").html(data);
                })
            });
        }
    );
    $(".viewPost").click(
        function () {
                let post_id=$(this).attr("post_id");
                $.get("../components/viewPost.php",{
                    post_id
                },function (data) {
                    $(".loader").html(data);
                })
        }
    );
</script>
