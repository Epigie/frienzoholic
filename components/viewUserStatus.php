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
    if(isset($_GET['index']) && isset($_GET['target_id'])){
        $index=$_GET['index'];
        $target_id=$_GET['target_id'];
        $sta = Status::getStatusIndex($target_id,$index);
        $totalNo = Status::getStatusNo($target_id);
        if(!($user_id==$target_id)){
            Status::seeStatus($user_id,$sta['status_id']);
        }
        $seenNo=Status::getSeenStatusNo($sta['status_id']);
?>
<div class="statusPhotosGrid" status_id="<?php echo $sta['status_id']; ?>">
    <?php
        if($index == 1){
            echo '<i></i>';
        }
        else{
            ?>
            <i id="previousStatus" class="fa fa-arrow-left p-3"></i>
            <?php
        }
    ?>
    <div class="m-0 p-0 d-flex justify-content-center flex-column">
        <p class="p-2 bg text-white m-0"><?php echo $sta['description'] ?></p>
        <img src="../images/uploads/<?php echo $sta['image_url'] ?>" alt="" class="viewStatusImage fade">
    </div>
    <?php
        if($index == $totalNo){
            echo '<i></i>';
        }
        else{
            ?>
            <i id="nextStatus" class="fa fa-arrow-right p-3"></i>
            <?php
        }
    ?>
</div>
<?php
if($target_id == $user_id){
        ?>
    <div class="row no-gutters" status_id="<?php echo $sta['status_id'] ?>">
        <div class="col-md-6 col-sm-6 bg-light text-danger center" id="deleteStatus">
            <i class="fa fa-times p-4 cursor">
            </i>
            <p class="m-0 p-0">Delete</p>
        </div>
        <div class="col-md-6 col-sm-6 bg-light center" id="viewStatusViewers">
            <i class="fa fa-eye p-4 cursor">
            </i>
            <p class="m-0 p-0"><?php echo $seenNo; ?></p>
        </div>
    </div>
    <?php
}
?>
<script>
    index++;
    $("#previousStatus").click(
        function () {
            index=index-2;
            $.get("../components/viewUserStatus.php",{
                    index,
                    target_id
            },function (data) {
                $("#statusImage").html(data);
            });
        }
    );
    $("#deleteStatus").click(
        function () {
            var status_id=$(this).parent().attr("status_id");
            $.get("../api/status.php",{
                deleteStatus:1,
                status_id,
            },function (data) {
                if(data == 1){
                    $(".wrapper").fadeOut(300);
                    setTimeout(()=>{
                        $(".loader").html('');
                        $(".status").load("../components/status.php");
                    },300);
                }
            })
        }
    );
    $("#nextStatus").click(
        function () {
            $.get("../components/viewUserStatus.php",{
                    index,
                    target_id
            },function (data) {
                $("#statusImage").html(data);
            });
        }
    );
    $("#viewStatusViewers").click(
        function () {
            var status_id=$(this).parent().attr("status_id");
            $.get("../components/statusSeenLists.php",{
                status_id
            },function (data) {
                $(".wrapper").html(data);
            })
        }
    );
</script>

<?php } ?>
