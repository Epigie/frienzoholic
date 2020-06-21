<?php
    include_once '../../classes/Users.php';
    include_once '../../classes/Messages.php';
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    $target_id=$_GET['target_id'];
    $page = $_GET['page'] ?? 1;
    $chats=Messages::getUserMessage($user_id,$target_id,$page);
    Messages::seeSendMessage($target_id,$user_id);
    for($i=(count($chats) - 1); $i>=0; $i--) {
?>
<div>
        <?php
                if($chats[$i]['from_user_id'] == $user_id){
                    ?>
                    <p class="indMessage bg-blue text-white float-right"><?php echo $chats[$i]['message']; ?><br>
                    <?php
                    if($chats[$i]['seen'] == 1){
                        echo '<i class="fa fa-eye" style="font-size:10px;">    </i>';
                    }
                    else{
                        echo '<i class="fa fa-check" style="font-size:10px;">    </i>';
                    }
                    ?>
                    </p>
                    <?php
                }
                else{
                    ?>
                    <p class="indMessage bg-white float-left"><?php echo $chats[$i]['message']; ?></p>
                    <?php
                }
        ?>
</div>
<div>

</div>
<?php } ?>
