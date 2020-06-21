<?php
    include '../../classes/Users.php';
    include '../../classes/Followers.php';
    include '../../classes/Posts.php';
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
?>
<div class="p fade">
    <div class="row border-bottom">
        <div class="col-md-4 col-sm-4 border-right center">
            <img src="../images/uploads/<?php echo $details['profile_pic'] ?>" alt="" class="profileIcon">
        </div>
        <div class="col-md-8 col-sm-8" style="padding:40px;">
            <div class="row align-items-center">
                <div class="col-md-8 col-sm-12">
                    <h2><?php echo $username; ?></h2>
                </div>
                <?php
                    if(!($user_id == $target_id)){
                        if(Followers::ifFollows($user_id,$target_id)){
                            ?>
                            <div class="col-md-8 col-sm-12 d-flex">
                                <button class="button bg text-white mr-2 d-flex align-items-center">
                                    Following <i class="fa fa-check ml-2">    </i>
                                </button>
                                <button class="button d-flex align-items-center mr-2" id="unfollowButton">
                                    Unfollow <i class="fa fa-times ml-2">    </i>
                                </button>
                                <button class="button d-flex align-items-center" id="sendMessageButton">
                                    Send Message <i class="fa fa-arrow-right ml-2">    </i>
                                </button>
                            </div>
                            <?php

                        }
                        else if(Followers::ifRequested($user_id,$target_id)){
                            ?>
                            <div class="col-md-8 col-sm-12 d-flex">
                                <button class="button bg text-white mr-2 d-flex align-items-center">
                                    Requested <i class="fa fa-user-check ml-2">    </i>
                                </button>
                                <div class="col-md-8 col-sm-12">
                                    <button class="button d-flex align-items-center" id="unfollowButton">
                                        unrequest <i class="fa fa-times ml-2">    </i>
                                    </button>
                                </div>
                            </div>
                            <?php

                        }
                        else{
                            ?>
                            <div class="col-md-8 col-sm-12 d-flex" id="followButton">
                                <button class="button mr-2">
                                    Follow <i class="fa fa-user-plus">    </i>
                                </button>
                                <?php
                                if(Users::isPublic($target_id)){
                                    ?>
                                    <button class="button d-flex align-items-center" id="sendMessageButton">
                                        Send Message <i class="fa fa-arrow-right ml-2">    </i>
                                    </button>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="row mt-3 no-gutters">
                <div class="col-md-4 col-sm-4">
                    <b class="text-blue"><?php echo $Posts ?> </b>Posts
                </div>
                <div class="col-md-4 col-sm-4">
                    <b class="text-blue"><?php echo $Followers ?> </b>Followers
                </div>
                <div class="col-md-4 col-sm-4">
                    <b class="text-blue"><?php echo $Follows ?> </b>Following
                </div>
            </div>
            <b>
                <p class="mt-3">
                    <?php echo $details['name'] ?>
                </p>
            </b>
            <p class="mt-3"><?php echo $details['bio'] ?></p>
        </div>
    </div>
    <div class="row p-4 pt-0" id="posts">

    </div>
</div>
<script>
    var user_id=<?php echo $user_id; ?>;
    var target_id=<?php echo $target_id; ?>;
    $.get("../components/profile/profilePosts.php",{
        target_id
    },function (data) {
        $("#posts").html(data);
    })
    function reLoadStatus() {
        $.get("../components/profile/profileGrid.php",{
            target_id:target_id
        },function (data) {
            $(".photos").html(data);
        });
    }
    $("#unfollowButton").click(
        function () {
            $.get("../api/followers.php",{unfollow:1,target_id},function (data) {
                $.get("../components/profile/profileDetails.php",{
                    user_id:target_id
                },function (data) {
                    $(".profileDetails").html(data);
                });
            })
            reLoadStatus();
        }
    );
    $("#unrequestButton").click(
        function () {
            $.get("../api/followers.php",{unfollow:1,target_id},function (data) {
                $.get("../components/profile/profileDetails.php",{
                    user_id:target_id
                },function (data) {
                    $(".profileDetails").html(data);
                });
                reLoadStatus();
            })
        }
    );
    $("#followButton").click(
        function(){
            button=$(this);
            target=$(this).parent().parent().attr("user_id");
            $.get("../api/followers.php",{
                follow:1,
                target:target_id
            },function(data){
                if(data == 'following'){
                    $.get("../components/profile/profileDetails.php",{
                        user_id:target_id
                    },function (data) {
                        $(".profileDetails").html(data);
                    });
                }
                if(data == 'requested'){
                    $.get("../components/profile/profileDetails.php",{
                        user_id:target_id
                    },function (data) {
                        $(".profileDetails").html(data);
                    });
                }
                reLoadStatus();
            });
        }
    );
    $("#sendMessageButton").click(
        function () {
            $.get("../components/profile/sendMessage.php",{

            },function (data) {
                $(".loader").html(data);
            })
        }
    );
</script>
