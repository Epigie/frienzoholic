<?php
    include_once '../classes/Users.php';
    include_once '../classes/Followers.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $username=Users::getUsername($user_id);
    $detail=Users::getUser($username);
?>
<form action="php/editProfile.php" method="post" enctype="multipart/form-data" class="fade" id="editProfile">
    <h5 class="bg-yellow p-3">Edit your profile..</h5>
    <hr>
    <div class="well row no-gutters align-items-center">
        <div class="col-sm-3">
            <img src="../images/uploads/<?php echo $detail['profile_pic']; ?>" class="icon" id="profile_pic" alt="">
        </div>
        <div class="col-sm-9">
            <label for="file">
                <div class="button bg text-white pill-rounded">Change Pic <i class="ml-2 fa fa-wrench"></i></div>
            </label>
        </div>
    </div>
    <label for="" class="mt-2">Bio : </label>
    <input type="text" name="bio" class="form-control" value="<?php echo $detail['bio'] ?>" rows="8" cols="80"></input>
    <label for="" class="mt-2">Name : </label>
    <input type="text" class="form-control" name="name" value="<?php echo $detail['name'] ?>" id="name">
    <label for="" class="mt-2">Phone : </label>
    <input type="number" class="form-control" value="<?php echo $detail['phone'] ?>" name="phone" id="phone">
    <label for="" class="mt-2">Gender : </label>
    <select name="gender" id="gender" class="form-control">
        <option value="m" <?php echo ($detail['gender'] == 'm')? "selected" : "" ;  ?>>Male</option>
        <option value="f" <?php echo ($detail['gender'] == 'f')? "selected" : "" ;  ?>>Female</option>
    </select>
    <label for="" class="mt-3">Private Account</label>
    <input type="checkbox" name="private" <?php echo ($detail['privacy'] == 'private')? "checked" : "" ;  ?> value=""><br>
    <button class="button bg text-white d-block" type="submit">Save</button>
    <input type="file" class="d-none" accept="image/jpeg" name="image" id="file">
</form>
<script>
        $("#file").change(
            function(event){
                $("#profile_pic").attr("src",URL.createObjectURL(event.target.files[0]));
            }
        );
</script>
