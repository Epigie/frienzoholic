<?php
    include_once '../classes/Users.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    if(!Users::isPublic($user_id)){
        ?>
        <div class="request d-flex align-items-center">
            <i class="fa fa-user-plus" id="requestButton">
            </i>
            <div class="m-0 requestNumber">
            </div>
            <div class="position-absolute p-2 shadow requestWindow" id="requestWindow">
            </div>
        </div>
        <?php
    }
?>
<div class="message d-flex align-items-center">
    <i class="fa fa-paper-plane" id="messageButton">
    </i>
    <div class="messageNumber">
    </div>
    <div class="position-absolute p-2 shadow requestWindow" id="messageWindow">

    </div>
</div>
<div class="notification d-flex align-items-center">
    <i class="fa fa-bell" id="notificationButton">
    </i>
    <div class="notificationNumber">
    </div>
    <div class="position-absolute p-2 shadow requestWindow" id="notificationWindow">
    </div>
</div>
<script>
    $("#requestWindow").fadeOut(300);
    $("#messageWindow").fadeOut(300);
    $("#notificationWindow").fadeOut(300);
    $("#requestButton").click(
        function () {
            $("#requestWindow").fadeToggle(300);
            $("#requestWindow").load("../components/notificationRequest.php");
        }
    );
    $("#messageButton").click(
        function () {
            $("#messageWindow").fadeToggle(300);
            $("#messageWindow").load("../components/notificationMessagesList.php");
        }
    );
    $("#notificationButton").click(
        function () {
            $("#notificationWindow").fadeToggle(300);
            $("#notificationWindow").load("../components/notificationsList.php");
        }
    );
    setInterval(checkNotifications,2000);
    function checkNotifications() {
        $.get("../api/notifications.php",{
            checkNotification:1
        },function (data) {
            if(data > 0){
                $(".notificationNumber").html(`
                        <div class="d-flex align-items-center badge badge-pill">${data}</div>
                `);
            }else{
                $(".notificationNumber").html('');
            }
        })
        $.get("../api/notifications.php",{
            checkMessage:1
        },function (data) {
            if(data > 0){
                $(".messageNumber").html(`
                        <div class="d-flex align-items-center badge badge-pill">${data}</div>
                `);
            }else{
                $(".messageNumber").html('');
            }
        })
        <?php if(!Users::isPublic($user_id)){ ?>
        $.get("../api/notifications.php",{
            checkRequest:1
        },function (data) {
            if(data > 0){
                $(".requestNumber").html(`
                        <div class="d-flex align-items-center badge badge-pill">${data}</div>
                `);
            }else{
                $(".requestNumber").html('');
            }
        })
        <?php } ?>
    }
</script>
