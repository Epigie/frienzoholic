<?php
    include '../../classes/Users.php';
    if(isset($_POST['username'])){
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
                case 'image/gif':
                    $image = imagecreatefromgif($source);
                    break;
                default:
                    $image = imagecreatefromjpeg($source);
            }
            imagejpeg($image, $destination, $quality);
            return $destination;
        }
        $uploadPath = "../../images/uploads/";
        $fileName = basename($_FILES["uploadPic"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniq=uniqid().".".$fileType;
        $imageUploadPath = $uploadPath . $uniq;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            $imageTemp = $_FILES["uploadPic"]["tmp_name"];
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 50);
        }
        $privacy= (isset($_POST['private'])) ? 'private' : 'public';
        Users::signUp($_POST['username'],$_POST['password'],$_POST['re-password'],$_POST['email'],$_POST['bio'],$_POST['name'],$_POST['phone'],$uniq,$_POST['gender'],$privacy);
        if($user_id=Users::getuser_id($_POST['username'])){
            session_start();
            $_SESSION['user_id']=$user_id;
            header("Location: ../home.php");
        }
    }
?>
