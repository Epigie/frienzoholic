<?php
    include '../classes/Users.php';
    include '../classes/Followers.php';
    session_start();
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_SESSION['user_id'];
        $username=Users::getUsername($_SESSION['user_id']);
        $follows=Followers::getFollowsNo($user_id);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/getFollowers.css">
    <link rel="stylesheet" href="../css/all.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery.js"></script>
    <title>Find People</title>
</head>
<body>
    <div class="fh row no-gutters">
        <div class="col-md-3 d-none d-md-block bg" style="height:100%;">
            <div class="center">
                <div class="card p-4 text-dark border-right-0">
                    <h5>Since, you are new here, Try following these people :)</h5>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12" id="main">
            <div id="typings">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-bars m-0 mr-3" id="barIcon"></i>
                        <h1 class="m-0">Frienzoholic</h1>
                    </div>
                    <a href="php/logOut.php" class="d-flex align-items-center">
                        <p class="m-0 mr-2">Log out </p>
                        <i class="fa fa-user-times"></i>
                    </a>
                </div>
                <div class="mt-3">
                    <small>You are following <small id="follows"><?php echo $follows; ?></small> people</small>
                    <p>You should follow <small class="text-danger">atleast <b> 3 </b> people</small> to get started in <b>frienzoholic</b></p>
                </div>
                <div class="searchBox position-relative">
                    <i class="fa fa-search position-absolute" id="searchIcon"></i>
                    <input type="text" placeholder="Search a user" class="form-control" name="" value="" id="searchBar">
                </div>
            </div>
            <div class="mt-2" id="profiles">
                <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                    <p class="mb-0">Here are some suggestions for you.. <br><small>Go <b>Home</b> when you are done. </small></p>
                    <a href="home.php" class="ml-4">
                        <button class="btn bg">Go Home <i class="fa fa-home"></i></button>
                    </a>
                </div>
                <div class="row no-gutters" id="profileHere">
                    <!--Profiles here-->
                    <?php
                        $profiles=Users::getUsers(1);
                        foreach ($profiles as $profile) {
                            if(!($user_id == $profile['user_id'])){
                                $requesed=Followers::ifRequested($user_id,$profile['user_id']);
                                $follows=Followers::ifFollows($user_id,$profile['user_id']);
                            ?>

                            <div class="col-lg-6 col-md-12 col-sm-12">
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
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/getFollowers.js"></script>
</body>
</html>
    <?php
    }
    else{
        header("Location: ../");
    }
?>
