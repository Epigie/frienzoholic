<div class="wrapper">
    <div class="card shadow fade p-3" style="max-width:800px;max-height:600px;">
        <div class="row no-gutters m-3 align-items-center">
            <div class="col-sm-9">
                <h5>Send a Message... </h5>
            </div>
            <div class="col-sm-3 center WindowClose">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
        <button class="button bg d-block text-white" id="send">Send <i class="fa fa-arrow-right">    </i></button>
    </div>
</div>
<script>
$(".WindowClose").click(
    function () {
        $(".wrapper").fadeOut(300);
        setTimeout(()=>{
            $(".loader").html('');
            $(".status").load("../components/status.php");
        },300);
    }
);
$("#send").click(
    function () {
        $.get("../api/messages.php",{
            sendMessage:1,
            target_id,
            message:$("#message").val()
        },function () {
            $(".wrapper").fadeOut(300);
            setTimeout(()=>{
                $(".loader").html('');
                $(".status").load("../components/status.php");
            },300);
        })
    }
);
</script>
