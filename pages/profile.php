<?php
        include '../classes/Users.php';
        session_start();
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
            $username=Users::getUsername($user_id);
            $profile_pic=Users::getProfilePic($user_id);
            if(isset($_GET['user_id'])){
                $target_id=$_GET['user_id'];
                $target_username=Users::getUsername($target_id);
            }
            if(isset($_GET['username'])){
                $target_username=$_GET['username'];
                $target_id=Users::getuser_id($target_username);
            }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/loading.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery.js" charset="utf-8"></script>
        <title>Profile</title>
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
          <div class="topbar">
              <?php include '../components/navBar.php'; ?>
          </div>
          <div class="profileDetails border-right">

          </div>
          <div class="photos">

          </div>
        </div>
        <div class="loader"></div>
        <script>
            var user_id=<?php echo $target_id; ?>;
        </script>
        <script src="../js/profile2.js" charset="utf-8"></script>
        <script src="../js/profile.js" charset="utf-8"></script>
    </body>
    </html>
<?php }
else{
    header("Location ../");
} ?>
