<?php
include_once 'classes/Users.php';
$message="";
if (isset($_POST['email']) && isset($_POST['password'])) {
  if(Users::logIn($_POST['email'], $_POST['password'])){
     $id=Users::getuser_id($_POST['email']);
     if($id==0)
        $id=Users::getUserIdFromEmail($_POST['email']);
     session_start();
     $_SESSION['user_id']=$id;
     header("Location: pages/home.php");
  }
  else{
      $message="Username or Password is wrong";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/indexfile.css">
  <title>Frienzoholic | Welcome</title>
  <script src="js/jquery.js"></script>
</head>

<body>
  <div class="pop position-absolute card text-dark p-4">
    <h1>About this project</h1>
    <p>This is the project done by me , <b>Benzigar</b><i class="fa fa-smile-o">&#xf118;</i> </p>
  </div>
  <div class="fh main">
    <div class="left">
      <div class="nav">
        <i class="fa fa-bars"></i>
        <h1>Frienzoholic</h1>
      </div>
      <div class="message">
        <h1>New User??</h1>
        <p>Join now by searching for a username..</p>
      </div>
      <div class="usernameCheck">
        <input type="text" placeholder="try a username.." name="username" id="username" class="form-control">
        <button class="icon"><i class="fa fa-arrow-right" id="nextButton"></i></button>
      </div>
      <p class="message" id="message"></p>
    </div>
    <div class="right">
      <h1>Welcome, back</h1>
      <small>Sign in to continue <i class="fa fa-arrow-down"></i></small>
      <?php
        if($message != "")
        echo '<p class="invalid" style="color:red; margin-bottom:10px;">'.$message.'</p>';
      ?>
      <hr>
      <form action="index.php" method="POST" id="logInForm">
        <div class="textbox">
          <label for="email">Enter the email or username : </label>
          <input type="text" placeholder="email or username" name="email" id="email" class="form-control" required>
        </div>
        <div class="textbox">
          <label for="password">Enter the password : </label>
          <input type="password" placeholder="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn">Sign in </button><br>
        <small class="info">Or, create a new account by entering a username left</small>
      </form>
    </div>
  </div>
  <script>
    $(".fa-bars").click(
      function(event) {
        $(".pop").toggleClass('active');
      }
    );
    $("#username").keyup(function(event) {
      let username = $("#username").val();
      if (username.length > 4) {
        if (event.key == "Enter") {
          $.get("api/users.php", {
            checkUsername: 1,
            username: username
          }, function(e) {
            if (e == 1) {
              window.location = window.location + "/pages/signUp.php?username=" + username;
            }
          })
        }
        $.get("api/users.php", {
          checkUsername: 1,
          username: username
        }, function(e) {
          $("#message").fadeIn(300);
          if (e == 1) {
            $("#message").removeClass('invalid');
            $("#message").text("Username available!!");
            $("#message").addClass('valid');
            $("#username").addClass('valid');
          }
          if (e == 0) {
            $("#message").removeClass('valid');
            $("#message").text("Username taken!!");
            $("#message").addClass('invalid');
            $("#username").addClass('invalid');
          }
        })
      } else {
        $("#message").fadeOut(300);
      }
    });
    $("#nextButton").click(
      function() {
        let username = $("#username").val();
        if (username.length > 4) {
          $.get("api/users.php", {
            checkUsername: 1,
            username: username
          }, function(e) {
            if (e == 1) {
              window.location = window.location + "pages/signUp.php?username=" + username;
            }
          })
        }
      }
    );
  </script>
</body>

</html>
