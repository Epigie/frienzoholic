<div class="wrapper">
    <div class="card p-4 fade">
            <form action="php/uploadStatus.php" method="post" enctype="multipart/form-data" class="d-flex flex-column fade" id="uploadPost">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="bg-yellow p-2">Upload a Status ,,</h5>
                    <div class="btn btn-light addStatusClose">
                        <i class="fa fa-times">    </i>
                    </div>
                </div>
                <label for="file">
                    <div class="bg p-2 border mt-2 text-white">Choose an image .. <i class="fa fa-camera"></i></div>
                </label>
                <input type="file" name="file" id="file" class="d-none" accept="image/jpeg" value="" required><br>
                <label for="">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                <button type="submit" name="uploadPost" class="button bg text-white">Put Status <i class="fa fa-upload"></i></button>
            </form>
    </div>
</div>

<script>
$(".addStatusClose").click(
    function () {
        $(".wrapper").fadeOut(300);
        setTimeout(()=>{$(".loader").html('');},300);
    }
);
</script>
