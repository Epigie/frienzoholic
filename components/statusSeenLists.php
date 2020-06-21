<?php
        include '../classes/Status.php';
        if(isset($_GET['status_id'])){
            $status_id=$_GET['status_id'];
            $seen=Status::getSeenStatus($status_id);
?>
<div class="wrapper">
        <div class="card fade">
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="m-0 mr-2">Status Seen People</h5>
                        </div>
                        <div class="btn btn-light StatusClose">
                            <i class="fa fa-times">    </i>
                        </div>
                    </li>
                        <?php
                                foreach ($seen as $s) {
                                    ?>
                                    <li class="list-group-item">
                                            <div class="row no-gutters align-items-center">
                                                    <div class="col-sm-4">
                                                            <img src="../images/uploads/<?php echo $s['profile_pic'] ?>" alt="" class="icon">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <b><?php echo $s['username'] ?></b>
                                                    </div>
                                            </div>
                                    </li>
                                    <?php
                                }
                        ?>
                </ul>
        </div>
</div>
<script>
$(".StatusClose").click(
    function () {
        $(".wrapper").fadeOut(300);
        setTimeout(()=>{
            $(".loader").html('');
            $(".status").load("../components/status.php");
        },300);
    }
);
</script>
<?php } ?>
