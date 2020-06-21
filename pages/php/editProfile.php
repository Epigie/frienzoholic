<?php
    include_once '../../classes/Users.php';
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
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $user_id=$_SESSION['user_id'];
    }
    else{
        $user_id=$_SESSION['user_id'];
    }
    if(isset($_POST['bio'])){
        $privacy= (isset($_POST['private'])) ? "private" : "public";
        if($_FILES['image']['error'] == 4){
            echo "File not loaded";
            Users::updateDetails($user_id, $_POST['bio'], $_POST['name'], $_POST['phone'], $_POST['gender'], $privacy);
            header("Location: ../home.php");
        }
        else{
            $uploadPath = "../../images/uploads/";
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $uniq=uniqid().".".$fileType;
            $imageUploadPath = $uploadPath . $uniq;
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                $imageTemp = $_FILES["image"]["tmp_name"];
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 50);
            }
            Users::updateDetails($user_id, $_POST['bio'], $_POST['name'], $_POST['phone'], $_POST['gender'], $privacy);
            Users::changeProfilePic($user_id,$uniq);
            header("Location: ../home.php");
        }
    }
?>
