<?php
    include_once '../classes/Users.php';
    include_once '../classes/Posts.php';
    include_once '../classes/Likes.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $username=Users::getUsername($user_id);
    $posts=Posts::getFeeds($user_id,1);
    //print_r($posts);
?>
<h1>Welcome back, <small><?php echo $username; ?></small></h1>
<hr>
<!--Profiles-->
<?php
        if(count($posts) == 0){
            echo "<p>No posts to be showed</p>";
        }
        foreach($posts as $post){
            $ifliked=Likes::ifLiked($user_id,$post['post_id']);
            if($ifliked)
                $liked="button liked";
            else{
                $liked="button";
            }
            ?>
            <div class="card mb-2 fade" post_id="<?php echo $post['post_id']; ?>">
                <div class="top_card m-3">
                  <div class="row no-gutters align-items-center">
                      <div class="col-sm-2 center">
                          <img class="icon" src="../images/uploads/<?php echo $post['profile_pic']; ?>" alt="">
                      </div>
                      <div class="col-sm-10">
                          <a href="profile.php?user_id=<?php echo $post['user_id']; ?>" class="text-blue">
                              <b><?php echo $post['username']; ?></b>
                          </a>
                      </div>
                      <div class="col">
                      </div>
                  </div>
                </div>
                <p class="mt-0 mx-4 mb-3"><?php echo $post['description']; ?></p>
                <img class="img-fluid viewPost" post_id="<?php echo $post['post_id']; ?>" src="../images/uploads/<?php echo $post['image_url']; ?>" alt="">
                <div class="buttons m-3 d-flex">
                      <button class="<?php echo $liked; ?> likeButton"> <i class="fa fa-heart"></i> Like <span class="ml-2"><?php echo $post['likes'] ?></span></button>
                      <button class="button ml-2 viewPost" post_id="<?php echo $post['post_id']; ?>"> <i class="fa fa-comments"></i> Comments <span class="ml-2"><?php echo $post['commentsNo'] ?></span></button>
                </div>
            </div>
            <?php
        }
?>
<?php
    if(count($posts) > 0){
        ?>
        <div class="d-flex justify-content-center">
            <button class="button p-2 bg-blue text-white d-block" id="fetchFeeds">
                Show more feeds
            </button>
        </div>
        <?php
    }
?>
<script>
    var page=1;
    $(".likeButton").click(
        function () {
            button=$(this);
            post_id=$(this).parent().parent().attr("post_id");
            $.get("../api/posts.php",{
                like:1,
                post_id
            },function (data) {
                console.log(data);
                $(button).html(`
                        <i class="fa fa-heart"></i> Like <span class="ml-2" id="#likeText">${data}</span>
                `);
            });
            $(this).toggleClass("liked");
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
    $("#fetchFeeds").click(
        function () {
            feedPage++;
            $(this).parent().removeClass("d-flex");
            $(this).parent().fadeOut(300);
            $.get("../components/fetchFeeds.php",{
                page:feedPage
            },function (data) {
                $(".feeds").append(data);
            })
        }
    );
</script>
