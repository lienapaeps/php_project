<?php

    include_once("DB.php");
    $targetDir = "images/";
    $uploadStatusMsg = "";

    if(isset($_POST["submitProfileImage"])){
        if(!empty($_FILES["profileImgUpload"]["name"])){
            $profileImgName = basename($_FILES["profileImgUpload"]["name"]);
            $target = $targetDir . $profileImgName; 
            $fileType = pathinfo($target, PATHINFO_EXTENSION);

            //allow certain formats
            $allowedTypes = array("jpg", "jpeg", "png", "gif");

            //upload file to server
            if(move_uploaded_file($_FILES["profileImgUpload"]["tmp_name"], $target)){
                $conn = DB::getConnection();
                $upload = $conn->prepare("insert into users (profile_img) values (:profileImg)");
                $upload->bindValue(":profileImg", $target);
                $upload->execute();
                if($upload){
                    $uploadStatusMsg = "The file ". basename( $_FILES["profileImgUpload"]["name"]). " has been uploaded.";
                } else {
                $uploadStatusMsg = "Upload failed, please try again.";
                }
            } else {
                $uploadStatusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $uploadStatusMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        $uploadStatusMsg = "Please select a file to upload";
    }