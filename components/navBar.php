<div class="row no-gutters border-bottom bg-white">
    <div class="col-md-1 col-sm-1 center bg-blue text-white d-none d-md-flex">
            <a href="home.php">
                <i class="fa fa-home fa-2x">

                </i>
            </a>
    </div>
    <div class="col-md-11 col-sm-12">
        <div class="topBar">
            <div class="searchBar border-right position-relative">
                <div class="p-3 position-relative">
                    <input type="text" class="text" placeholder="Search a User" id="searchBox" name="" value="">
                    <i class="fa fa-search" id="searchIcon"></i>
                </div>
                <div class="position-absolute" id="searchResults">

                </div>
            </div>
            <div class="notificationBar border-right p-3 center">
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                        if(isset($_SESSION['user_id'])){
                            include_once '../components/notifications.php';
                            include_once '../classes/Users.php';
                            $user_id=$_SESSION['user_id'];
                            $profile_pic=Users::getProfilePic($user_id);
                        }
                }
                else{
                    if(isset($_SESSION['user_id'])){
                        include_once '../components/notifications.php';
                        include_once '../classes/Users.php';
                        $user_id=$_SESSION['user_id'];
                        $profile_pic=Users::getProfilePic($user_id);
                    }
                }
                ?>
            </div>
            <div class="userBar d-flex align-items-center justify-content-end bg">
                <a href="profile.php?user_id=<?php echo $user_id; ?>">
                    <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="image" class="icon mr-3">
                </a>
                <a href="php/logOut.php" class="mr-4 logOutTop">
                    Log out <i class="fa fa-window-close ml-">
                    </i>
                </a>
            </div>
        </div>
    </div>
</div>
