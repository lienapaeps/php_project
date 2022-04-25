<?php

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
            if(in_array($fileType, $allowedTypes)){
                if(move_uploaded_file($_FILES["profileImgUpload"]["tmp_name"], $target)){
                    $uploadStatusMsg = "The file " . basename($_FILES["profileImgUpload"]["name"]) . " has been uploaded.";
                } else {
                    $uploadStatusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $uploadStatusMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            if(move_uploaded_file($_FILES["profileImgUpload"]["tmp_name"], $target)){
                $conn = DB::getConnection();
                $stmt = $conn->prepare("insert into users profile_img values :profileImg where user_id = :userId");
                $stmt->bindValue(":profileImg", $target);
                $stmt->bindValue(":userId", $_SESSION["user"]["id"]);
                $stmt->execute($target);
                if($stmt){
                    $uploadStatusMsg = "The file ". basename( $_FILES["profileImgUpload"]["name"]). " has been uploaded.";
                } else {
                $uploadStatusMsg = "Upload failed, please try again.";
                }
            } else {
                $uploadStatusMsg = "Sorry, there was an error uploading your file.";
                echo $target;
            }
        } else {
            $uploadStatusMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        $uploadStatusMsg = "Please select a file to upload";
    }