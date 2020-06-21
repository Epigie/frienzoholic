<?php
    include_once '../../classes/Status.php';
    function compressImage($source, $destination, $quality) {
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];
        switch($mime){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            default:
                $image = imagecreatefromjpeg($source);
        }
        imagejpeg($image, $destination, $quality);
        return $destination;
    }
    if(isset($_POST['uploadPost'])){
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
                $user_id=$_SESSION['user_id'];
        }
        else{
            $user_id=$_SESSION['user_id'];
        }
        $description = (strlen($_POST['description']) == 0) ? null : $_POST['description'];
        //Uploading concept
        $size=(int)($_FILES['file']['size'] / KB);
        $percentage=(int)(($size/(2 * KB))*100);
        if($percentage > 85) $percentage=85;
        $percentage=100 - $percentage;
        $uploadPath = "../../images/uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniq=uniqid().".".$fileType;
        $imageUploadPath = $uploadPath . $uniq;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            $imageTemp = $_FILES["file"]["tmp_name"];
            $compressedImage = compressImage($imageTemp, $imageUploadPath, $percentage);
        }
        Status::uploadStatus($user_id,$uniq,$description);
        header("Location: ../home.php");
    }
?>
