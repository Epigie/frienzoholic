<?php
        include '../classes/Users.php';
        include '../classes/Followers.php';
        session_start();
        if(isset($_SESSION['user_id'])){
            $username=Users::getUsername($_SESSION['user_id']);
            $profile_pic=Users::getProfilePic($_SESSION['user_id']);
            $follows = Followers::getFollowsNo($_SESSION['user_id']);
            if($follows < 3)
            {
                header("Location: getFollowers.php");
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js" charset="utf-8"></script>
    <title>Home</title>
    <script>
            var feedPage=1;
    </script>
</head>
<body>
    <div class="loading text-white">
        <h1 class="m-0 ml-2 fade">Loading.... </h1>
        <p class="m-0 ml-2 fade">Please wait.. :)</p>
        <div class="psoload m-0">
          <div class="straight"></div>
          <div class="curve"></div>
          <div class="center"></div>
          <div class="inner"></div>
        </div>
    </div>
    <div class="main">
      <div class="sideBar text-white">
          <p class="title">Frienzoholic</p>
        <i class="fa fa-bars text-white fa-2x" id="icon" style="margin-bottom:28px;">
        </i>
        <i title="Profile Details" id="profileDetails" class="fa fa-user fa-1x text-center p-4 sideBar-active" style="width:100%;"></i>
        <i title="Upload Post" id="uploadPost" class="fa fa-upload fa-1x text-center p-4" style="width:100%;"></i>
        <i class="fa fa-users fa-1x text-center p-4" id="followers" style="width:100%;"></i>
        <i class="fa fa-wrench fa-1x text-center p-4" id="wrench" style="width:100%;"></i>
      </div>
      <div class="topBar border-bottom">
        <div class="searchBar border-right position-relative">
            <div class="p-3 position-relative">
                <input type="text" class="text" placeholder="Search a User" id="searchBox" name="" value="">
                <i class="fa fa-search" id="searchIcon"></i>
            </div>
            <div class="position-absolute" id="searchResults">

            </div>
        </div>
        <div class="notificationBar border-right p-3 center">
            <?php include '../components/notifications.php'; ?>
        </div>
        <div class="userBar d-flex align-items-center justify-content-end bg">
            <a href="">
                <img src="../images/uploads/<?php echo $profile_pic; ?>" alt="image" class="icon mr-3">
            </a>
            <a href="php/logOut.php" class="mr-4 logOutTop">
                Log out <i class="fa fa-window-close ml-">
                </i>
            </a>
        </div>
      </div>
      <div class="feeds border-right p-4">
          <?php include '../components/feeds.php'; ?>
      </div>
      <div class="tools p-3" id="tools">
        <?php include '../components/profileDetails.php'; ?>
      </div>
      <div class="status">
          <?php include '../components/status.php'; ?>
      </div>
      <div class="bottomBar"></div>
    </div>
    <div class="loader">    </div>
    <script src="../js/home.js"></script>
</body>
</html>
            <?php
        }
        else {
            header("Location: ../index.php");
        }
?>
