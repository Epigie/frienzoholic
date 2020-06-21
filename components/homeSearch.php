<?php
    if(isset($_GET['search'])){
        $search=$_GET['search'];
        if(strlen($search) > 1){
            include_once '../classes/Users.php';
            include_once '../classes/Followers.php';
            if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                    $user_id=$_SESSION['user_id'];
            }
            else{
                $user_id=$_SESSION['user_id'];
            }
            ?>
            <div class="card shadow">
                <ul class="list-group">
            <?php
            $searchResults=Users::searchUser($search);
            if(count($searchResults) > 0){
                foreach ($searchResults as $result) {
                    if(!($result['user_id'] == $user_id)){
                        $followDetails=Followers::ifFollows($user_id,$result['user_id']);
                        $requestedDetails=Followers::ifRequested($user_id,$result['user_id']);
                    ?>
                            <li class="list-group-item" user_id="<?php echo $result['user_id']; ?>">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-sm-2">
                                            <img src="../images/uploads/<?php echo $result['profile_pic'] ?>" alt="" class="icon">
                                    </div>
                                    <div class="col-sm-5">
                                            <a href="profile.php?user_id=<?php echo $result['user_id'] ?>">
                                                <b class="text-primary"><?php echo $result['username'] ?></b>
                                            </a>
                                    </div>
                                    <?php
                                        if($followDetails){
                                            echo '
                                            <div class="col-sm-5 searchFollowButton">
                                                    <div class="button bg-blue btn-block text-white d-flex align-items-center justify-content-center">Following
                                                    <i class="fa fa-user-check ml-2"></i></div>
                                            </div>';
                                        }
                                        else if($requestedDetails){
                                            echo '
                                            <div class="col-sm-5 searchFollowButton">
                                                    <div class="button bg-blue btn-block text-white d-flex align-items-center justify-content-center border-none">Requested
                                                    <i class="fa fa-check ml-2"></i></div>
                                            </div>';
                                        }
                                        else {
                                            echo '
                                            <div class="col-sm-5 searchFollowButton">
                                                    <div class="button btn-block d-flex align-items-center justify-content-center border-none">Follow
                                                    <i class="fa fa-user-plus ml-2"></i></div>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </li>
                    <?php
                        }
                }
                ?>
                    </ul>
                </div>
                <?php
            }
            else{

            }
        }
    }
?>
<script>
    $(".searchFollowButton").click(
        function(){
            button=$(this);
            target=$(this).parent().parent().attr("user_id");
            $.get("../api/followers.php",{
                follow:1,
                target:target
            },function(data){
                if(data == 'following'){
                    $(button).html(`
                        <div class="button bg-blue btn-block text-white d-flex align-items-center justify-content-center">Following
                        <i class="fa fa-user-check ml-2"></i></div>
                    `);
                }
                if(data == 'requested'){
                    $(button).html(`
                        <div class="button bg-blue btn-block text-white d-flex align-items-center justify-content-center border-none">Requested
                        <i class="fa fa-check ml-2"></i></div>
                    `);
                }
            });
        }
    );
</script>
