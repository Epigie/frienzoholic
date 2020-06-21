<?php
        include_once '../classes/Users.php';
        include_once '../classes/Posts.php';
        include_once '../classes/Likes.php';
        include_once '../classes/Comments.php';
        $post_id=$_GET['post_id'];
        $post_image=Posts::getImage($post_id);
        $target_id=Posts::getPostUserId($post_id);
        $target_profile_pic=Users::getProfilePic($target_id['id']);
        $target_username=$target_id['username'];
        $target_id=$target_id['id'];
?>
<div class="wrapper">
    <div class="card shadow fade" style="max-width:800px;max-height:600px;">
        <div class="row no-gutters">
            <div class="col-lg-7 col-md-7 col-sm-12 border-right" id="postDetails">
                <div class="row no-gutters m-3 align-items-center">
                        <div class="col-sm-4">
                                <img src="../images/uploads/<?php echo $target_profile_pic; ?>" alt="" class="icon">
                        </div>
                        <div class="col-sm-5">
                                <b><?php echo $target_username; ?></b>
                        </div>
                        <div class="col-sm-3 center PostClose">
                                <i class="fa fa-times">
                                </i>
                        </div>
                </div>
                <img src="../images/uploads/<?php echo $post_image; ?>" alt="" class="postImage fade">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 d-flex flex-column">
                <div class="d-flex justify-content-stretch">
                        <button class="button button-active" id="commentButton">
                            <i class="fa fa-comments mr-2"></i>
                            Comments
                        </button>
                        <button class="button" id="getLikeButton">
                                <i class="fa fa-heart mr-2"> </i>Likes
                        </button>
                </div>
                <div class="row no-gutters align-items-center p-2" id="commentForm">
                    <div class="col-md-10 col-sm-10">
                        <input type="text" placeholder="Add a comment.." id="addComment" class="form-control w-100" name="" value="">
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <button class="btn btn-light">
                            <i class="fa fa-arrow-right">    </i>
                        </button>
                    </div>
                </div>
                <div class="list-group" id="fileArea" style="max-height:280px;overflow-y:scroll;">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
var post_id=<?php echo $post_id; ?>;
$(".PostClose").click(
    function () {
        $(".wrapper").fadeOut(300);
        setTimeout(()=>{
            $(".loader").html('');
            $(".status").load("../components/status.php");
        },300);
    }
);
$("#addComment").keyup(
    function (event) {
        if(event.key=="Enter"){
            var comment=$("#addComment").val();
            $.get("../api/comments.php",{
                comment:1,
                post_id,
                value:comment
            },function () {
                $.get("../components/comments.php",{
                    post_id
                },function (data) {
                    $("#addComment").val('');
                    $("#fileArea").html(data);
                })
            })
        }
    }
);
$.get("../components/comments.php",{
    post_id
},function (data) {
    $("#fileArea").html(data);
});
$("#commentButton").click(
    function () {
        $.get("../components/comments.php",{
            post_id
        },function (data) {
            $("#fileArea").html(data);
        });
        $("#commentForm").fadeIn(300);
        $("#getLikeButton").removeClass("button-active");
        $(this).removeClass("button-active");
        $(this).addClass("button-active");
    }
);
$("#getLikeButton").click(
    function () {
        $("#commentForm").fadeOut(300);
        $.get("../components/profile/viewLikesList.php",{
            post_id
        },function (data) {
            $("#fileArea").html(data);
        });
        $("#getLikeButton").removeClass("button-active");
        $(this).removeClass("button-active");
        $(this).addClass("button-active");
        $("#commentButton").removeClass("button-active");
        $(this).addClass("button-active");
    }
);
</script>
