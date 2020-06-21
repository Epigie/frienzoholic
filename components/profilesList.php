<?php
    include '../classes/Users.php';
    include '../classes/Followers.php';
    session_start();
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_SESSION['user_id'];
        $username=Users::getUsername($_SESSION['user_id']);
    $profiles=Users::getUsers(1);
    foreach ($profiles as $profile) {
        if(!($user_id == $profile['user_id'])){
            $requesed=Followers::ifRequested($user_id,$profile['user_id']);
            $follows=Followers::ifFollows($user_id,$profile['user_id']);
        ?>

        <div class="col-md-6 col-sm-12">
            <div class="card m-2" user_id="<?php echo $profile['user_id'] ?>" id="profile">
                <img src="../images/uploads/<?php echo $profile['profile_pic'] ?>" alt="">
                <a href="profile.php?user_id=<?php echo $profile['user_id'] ?>">
                    <p class="m-0"><?php echo $profile['username'] ?></p>
                    <?php
                        if(Users::isPublic($profile['user_id'])){
                            ?>
                            <small class="text-muted">Public Account</small>
                            <?php
                        }
                        else{
                            ?>
                            <small class="text-muted">Private Account</small>
                            <?php
                        }
                    ?>
                </a>
                <div class="center followButton">
                    <?php
                        if($requesed){
                            echo '
                            <div class="btn follow d-flex align-items-center">
                                 <i class="fa fa-check mr-2"></i>Requested
                            </div>
                            ';
                        }
                        else if($follows){
                            echo '
                            <div class="btn follow d-flex align-items-center">
                                 <i class="fa fa-check mr-2"></i>Following
                            </div>
                            ';
                        }
                        else{
                            echo '
                                <div class="btn bg">
                                     <i class="fa fa-user-add mr-2"></i>Follow
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
        }
    }
    ?>
    <script>
    $(".followButton").click(
        function() {
            let button=$(this);
            let user_id=$(this).parent().attr("user_id");
            user_id=parseInt(user_id);
            $.get("../api/followers.php",{
                follow:1,
                target:user_id
            },function (data) {
                if(data == ''){
                    console.log("nothing");
                }
                if(data == 'following'){
                    $(button).html(`
                        <div class="btn follow d-flex align-items-center">
                             <i class="fa fa-check mr-2"></i>Following
                        </div>
                    `);
                    let follows=parseInt($("#follows").html())+1;
                    $("#follows").html(follows);
                }
                if(data == 'requested'){
                    $(button).html(`
                        <div class="btn follow d-flex align-items-center">
                             <i class="fa fa-check mr-2"></i>Requested
                        </div>
                    `);
                }
                $("#profileHere").load("../components/profilesList.php");
            })
        }
    );

    </script>
