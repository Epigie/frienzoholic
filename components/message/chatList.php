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
    $activeChat=$_GET['activeChat'];
    $chats=Messages::getChats($user_id);
?>
<ul class="list-group list-group-flush">
    <?php foreach ($chats as $chat) { $unread=Messages::getNewMessageNoFromTarget($user_id,$chat['user_id']); ?>
  <li class="list-group-item indiMessage <?php echo ($chat['user_id'] == $activeChat) ? 'bg-light' : ''  ?>" user_id="<?php echo $chat['user_id'] ?>">
      <div class="row no-gutters">
              <div class="col-sm-3">
                      <img src="../images/uploads/<?php echo $chat['profile_pic'] ?>" alt="" class="icon">
              </div>
              <div class="col-sm-7">
                      <b><?php echo $chat['username'] ?></b><br>
                      <small class="text-muted"><?php echo $chat['message'] ?></small>
              </div>
              <div class="col-sm-2">
                  <?php
                        if($unread)
                        echo '
                        <p class="badge bg-red">'.$unread.'</p>
                        ';
                  ?>
              </div>
      </div>
  </li>
<?php } ?>

</ul>
<script>
$(".indiMessage").click(
    function () {
        activeChat=$(this).attr("user_id");
        $.get("../api/messages.php",{ seeMessage:1,target_id:activeChat });
    }
);
</script>
