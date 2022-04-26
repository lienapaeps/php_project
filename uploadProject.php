<?php
include_once("bootstrap.php");

//upload file to server
if (isset($_POST['submit'])) {
    $title = $_POST['project_title'];
    $description = $_POST['project_description'];

    $file = $_FILES['project_cover'];

    $fileName = $_FILES['project_cover']['name'];
    $fileTmpName = $_FILES['project_cover']['tmp_name'];
    $fileSize = $_FILES['project_cover']['size'];
    $fileError = $_FILES['project_cover']['error'];
    $fileType = $_FILES['project_cover']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $files = $_FILES['project_imgs'];
    $filesName = $_FILES['project_imgs']['name'];
    $filesTmpName = $_FILES['project_imgs']['tmp_name'];
    $filesSize = $_FILES['project_imgs']['size'];
    $filesError = $_FILES['project_imgs']['error'];
    $filesType = $_FILES['project_imgs']['type'];

    $filesExt = explode('.', $filesName);
    $filesActualExt = strtolower(end($filesExt));

    $allowed = array('jpg', 'jpeg', 'png', "mp4", "gif");

    //table projects
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                //query 
                $date = date('Y-m-d H:i:s');

                $conn = DB::getConnection();
                $statement = $conn->prepare("insert into projects (title, description, time, cover_img, user_id, project_content_id) values (:title, :description, :time, :cover_img, :user_id, :project_content_id)");
                $statement->bindValue(':title', $title);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':time', $date);
                $statement->bindValue(':cover_img', $fileNameNew);
                $statement->bindValue(':user_id', $_SESSION['user_id']);
                $statement->bindValue(':project_content_id', );
                $statement->execute();

                header("Location: projectForm.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    //table project_content
    if (in_array($filesActualExt, $allowed)) {
        if ($filesError === 0) {
            if ($filesSize < 1000000) {
                $filesNameNew = uniqid('', true) . "." . $filesActualExt;
                $filesDestination = 'uploads/' . $filesNameNew;
                move_uploaded_file($filesTmpName, $filesDestination);

                //query 
                $conn = DB::getConnection();
                $statement = $conn->prepare("insert into project_content ( url, alt, content_type ) values ( :url, :alt, :content_type )");

                $statement->execute();

                header("Location: projectForm.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}