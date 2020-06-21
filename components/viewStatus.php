<?php
        if(isset($_GET['viewStatus'])){
            include_once '../classes/Users.php';
            include_once '../classes/Status.php';
            if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                    $user_id=$_SESSION['user_id'];
            }
            else{
                $user_id=$_SESSION['user_id'];
            }
            $target_id=$_GET['user_id'];
            $targetUsername=Users::getUsername($target_id);
            $targetProfilePic=Users::getProfilePic($target_id);
?>
<div class="wrapper">
    <div class="card fade">
            <div class="p-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="../images/uploads/<?php echo $targetProfilePic ?>" alt="" class="icon mr-2">
                    <h5 class="m-0 mr-4"><?php echo $targetUsername ?></h5>
                </div>
                <div class="btn btn-light StatusClose">
                    <i class="fa fa-times">    </i>
                </div>
            </div>
            <div id="statusImage"></div>
    </div>
</div>
<script>
var index=1;
var target_id=<?php echo $target_id; ?>;
console.log(index + target_id);
$(".StatusClose").click(
    function () {
        $(".wrapper").fadeOut(300);
        setTimeout(()=>{
            $(".loader").html('');
            $(".status").load("../components/status.php");
        },300);
    }
);
$("#previousStatus").click(
    function () {
        alert("Selected");
    }
);
$("#nextStatus").click(
    function () {
        alert("Selected");
    }
);
$.get("../components/viewUserStatus.php",{
        index,
        target_id
},function (data) {
    $("#statusImage").html(data);
});
</script>

<?php
}
?>
