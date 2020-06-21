<?php
    include_once '../classes/Users.php';
    include_once '../classes/Status.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $status=Status::getNewStatusList($user_id,1);
    $seenStatus=Status::getSeenStatusList($user_id,1);
    $profile_pic=Users::getProfilePic($user_id);
?>
<div class="d-flex pb-2 fade border-bottom p-4">
    <div class="d-flex align-items-center mr-2" id="addStatus">
        <i class="fa fa-plus mr-3">    </i>
        <small>Add Status</small>
    </div>
    <?php
        if(Status::ifStatus($user_id)){
    ?>
    <img src="../images/uploads/<?php echo $profile_pic; ?>" class="statusImage userStatus" alt="">
    <?php } ?>
</div>
<div class="statusGrid">
      <?php
        foreach ($status as $stat) {
            ?>
            <div user_id="<?php echo $stat['user_id']; ?>" class="d-flex flex-column align-items-center mt-2" user_id="">
                <img src="../images/uploads/<?php echo $stat['profile_pic']; ?>" class="statusView statusImage" alt="">
                <small class="text-center"><?php echo $stat['username']; ?></small>
            </div>
            <?php
        }
      ?>
      <?php
        foreach ($seenStatus as $stat) {
            ?>
            <div user_id="<?php echo $stat['user_id']; ?>" class="d-flex flex-column align-items-center mt-2 seenStatus" user_id="">
                <img src="../images/uploads/<?php echo $stat['profile_pic']; ?>" class="statusView statusImage" alt="">
                <small class="text-center"><?php echo $stat['username']; ?></small>
            </div>
            <?php
        }
      ?>
</div>
<script>
    var user_id=<?php echo $user_id;  ?>;
    $(".statusView").click(
        function () {
            let user_id=$(this).parent().attr("user_id");
            $.get("../components/viewStatus.php",{
                viewStatus:1,
                user_id:user_id
            },function (data) {
                $(".loader").html(data);
            })
        }
    );
    $(".userStatus").click(
        function () {
            $.get("../components/viewStatus.php",{
                viewStatus:1,
                user_id:user_id
            },function (data) {
                $(".loader").html(data);
            })
        }
    );
    $("#addStatus").click(
        function () {
            $(".loader").load("../components/addStatus.php");
        }
    );
</script>
