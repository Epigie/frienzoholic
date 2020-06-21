<form action="php/uploadPost.php" method="post" enctype="multipart/form-data" class="d-flex flex-column fade" id="uploadPost">
    <h5 class="bg-yellow p-2">Upload a Post ,,</h5>
    <label for="file">
        <div class="bg p-2 border mt-2 text-white">Choose an image .. <i class="fa fa-camera"></i></div>
    </label>
    <input type="file" name="file" id="file" class="d-none" accept="image/jpeg,image/x-png" value="" required>
    <label for="">Description</label>
    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
    <button type="submit" name="uploadPost" class="button bg text-white">Upload Post <i class="fa fa-upload"></i></button>
</form>
