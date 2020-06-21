<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/jquery.js" charset="utf-8"></script>
    <title>Messages</title>
</head>
<body>
    <div class="loading text-white">
        <h1 class="m-0 ml-2 fade">Loading.... </h1>
        <p class="m-0 ml-2 fade">Please wait.. :)</p>
        <div class="psoload m-0">
          <div class="straight"></div>
          <div class="curve"></div>
          <div class="center"></div>
          <div class="inner"></div>
        </div>
    </div>
    <div class="main">
      <div class="topbar">
          <?php include '../components/navbar.php'; ?>
      </div>
      <div class="chats bg-white">

      </div>
      <div class="messages">
        <div class="eachMessage d-flex flex-column justify-content-end pr-4 pl-4">

        </div>
        <div class="input bg-white border-left p-4">
          <div class="inputArea d-flex align-items-center justify-content-end pl-2">
              <input type="text" class="form-control" placeholder="Type in the message .. " name="" value="" id="sendMessage" style="width:90%;">
          </div>
          <div class="send d-flex align-items-center pr-2">
                <button class="btn btn-light bg-blue text-white"><i class="fa fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/message.js" charset="utf-8"></script>
</body>
</html>
