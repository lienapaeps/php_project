<?php

    if(isset($_POST["submitProfileImage"])){
        $profileImgName = $_FILES["profileImgUpload"]["name"];
        
        $target = "images/" . $profileImgName; 

        move_uploaded_file($_FILES["profileImgUpload"]["tmp_name"], $target);
    } 