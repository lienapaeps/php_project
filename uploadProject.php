<?php
include_once("bootstrap.php");

//upload file to server
if (isset($_POST['submit'])) {
    $title = $_POST['project_title'];

    $file = $_FILES['project_cover'];

    $fileName = $_FILES['project_cover']['name'];
    $fileTmpName = $_FILES['project_cover']['tmp_name'];
    $fileSize = $_FILES['project_cover']['size'];
    $fileError = $_FILES['project_cover']['error'];
    $fileType = $_FILES['project_cover']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                //query 
                $conn = DB::getConnection();
                $statement = $conn->prepare("insert into upload (title, cover_img) values (:title, :cover_img)");
                $statement->bindValue(':title', $title);
                $statement->bindValue(':cover_img', $fileNameNew);
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
// projects:
//id, title, description, time, cover_img, warned, showcase, amount_views, user_id, project_content_id
