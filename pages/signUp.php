<?php
if(isset($_POST['username'])){
	print_r($_POST);
}
if(isset($_GET['username'])){
	$username=$_GET['username'];
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/signUp.css">
	<link rel="stylesheet" href="../css/all.css">
	<script src="../js/jquery.js" charset="utf-8"></script>
	<title>Sign Up</title>
</head>
<body>
	<div class="row fh no-gutters">
		<div class="col-md-4 bg col-sm-0 d-none d-md-block d-lg-block">
			<div  class="p">
				<h1>Frienzoholic</h1>
				<p>Find your friends now <i class="fa fa-arrow-right">	</i></p>
			</div>
			<div class="p">
				<img src="../images/fun.svg" class="img-fluid" alt="">
			</div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="p d-flex justify-content-end">
				<p>Already a member ? <a href=".." class="color">Sign in <i class="fa fa-user">	</i></a></p>
			</div>
			<form action="php/checkSignUp.php" class="px" novalidate method="post" enctype="multipart/form-data">
				<div class="border-left px">
					<h1>Sign In.</h1>
					<p>Fill the following form to get joined</p>
				</div>
				<div class="px">
					<div id="message"></div>
					<!--Form 1-->
					<div class="form-1">
						<b>Step 1 of 3 : </b>
						<input type="hidden" name="username" value="<?php echo $username; ?>">
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="username">Username : </label>
							</div>
							<div class="col-sm-9">
								<input type="text" value="<?php echo $username; ?>" class="form-control" name="username" id="username" disabled>
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="password">Password : </label>
							</div>
							<div class="col-sm-9">
								<input type="password" placeholder="Password should be above 4 characters long" class="form-control" name="password" id="password" required value="">
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="password">Re-Enter
									Password : </label>
							</div>
							<div class="col-sm-9">
								<input type="password" placeholder="Should be same as the previous password" class="form-control" name="re-password" id="re-password" required value="">
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="password">Profile name : </label>
							</div>
							<div class="col-sm-9">
								<input type="text" placeholder="This is the profile name for your account.." class="form-control" name="name" id="name" value="">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								<a href="../">
									<button class="btn btn-block btn-light border">Back to Home page</button>
								</a>
							</div>
							<div class="col-sm-6">
								<div class="btn btn-block bg" id="nextToForm-2">Next</div>
							</div>
						</div>
					</div>
					<!--Form 2-->
					<div class="form-2">
						<b>Step 2 of 3 : </b>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="email">Email : </label>
							</div>
							<div class="col-sm-9">
								<input type="email" value="" placeholder="example@123.com" class="form-control" name="email" id="email" required>
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="number">Phone  : </label>
							</div>
							<div class="col-sm-9">
								<input type="number" value="" placeholder="987654321" class="form-control" name="phone" id="phone" required>
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="number">Bio  : </label>
							</div>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3" placeholder="Enter something about you.. :)" name="bio" id="bio">
								</textarea>
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="number">Choose Gender  : </label>
							</div>
							<div class="col-sm-9">
								<select name="gender" id="name" id="gender" class="form-control" required>
									<option value="m" selected>Male</option>
									<option value="f">Female</option>
								</select>
							</div>
						</div>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="number">Private Account  : </label>
							</div>
							<div class="col-sm-9">
								<input type="checkbox" name="private" id="private">
								<small>(You should give permission to follow you, Your account will be kept private)</small>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								<div class="btn btn-block btn-light border" id="goToForm-1">Back</div>
							</div>
							<div class="col-sm-6">
								<div class="btn btn-block bg" id="nextToForm-3">Next</div>
							</div>
						</div>
					</div>
					<!--Form 3-->
					<div class="form-3">
						<b>Step 3 of 3 : </b>
						<div class="row no-gutters align-items-center mt-3">
							<div class="col-sm-3">
								<label class="m-0 p-0" for="email">Profile Picture : </label>
							</div>
							<div class="col-sm-9">
								<label for="uploadPic">
									<div class="btn btn-light">Upload a Profile Picture <i class="fa fa-upload ml-2"></i></div>
								</label>
							</div>
						</div>
						<input type="file" accept="image/jpeg, image/png" class="d-none" name="uploadPic" id="uploadPic">
						<small>Choose a square shaped image ... :)</small><br>
						<img src="" class="profile" alt="">
						<hr>
						<div class="row no-gutters mt-4">
							<div class="col-sm-6">
								<div class="btn btn-light btn-block" id="goToForm-2">Back</div>
							</div>
							<div class="col-sm-6">
								<button type="submit" class="btn bg btn-block">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="../js/signUp.js"></script>
</body>
</html>
	<?php
}
else{
	header("Location: ../index.php");
}
