<?php 

    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //checking if image is actual or fake image
    if(isset($_POST["submit"]) && isset($_FILES['file'])) {
        $file_temp = $_FILES['fileUpload']['tmp_name'];
        $check = getimagesize($file_temp);
        if($check !== false) {
            $succesImage = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errorImage = "File is not an image.";
            $uploadOk = 0;
        }
    }

    //checking if file already exists
    if (file_exists($target_file)) {
        $errorFileExists = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    //checking file size
    if($_FILES["fileUpload"]["size"] > 500000) {
        $errorFileSize = "Sorry, your file is too large";
    }

    //checking file types
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $errorFileType = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    header("location: profile.php");
    echo "succes!";