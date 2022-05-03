<?php
include_once("bootstrap.php");

session_start();

// https://www.positronx.io/php-multiple-files-images-upload-in-mysql-database/
// https://codingstatus.com/upload-multiple-files-in-mysql-database-using-php/?fbclid=IwAR0_Mik5Nkqe2vzaZwYGf9RE8ykoBHZLUCjQeiBqcuIW7qahkudlh4wjRk0

$error = "";
$succes = "";

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

    $allowed = array('jpg', 'jpeg', 'png', "mp4", "gif");

    //table projects
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                //query 

                // id, title, description, time, cover_img, warned, showcase, amount_views, user_id
                $date = date('Y-m-d H:i:s');

                $conn = DB::getConnection();
                $statement = $conn->prepare("insert into projects (title, description, time, cover_img, user_id) values (:title, :description, :time, :cover_img, :user_id)");
                $statement->bindValue(':title', $title);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':time', $date);
                $statement->bindValue(':cover_img', $fileNameNew);
                $statement->bindValue(':user_id', $_SESSION['user']['id']);
                $statement->execute();

                if ($statement) {
                    $succes = "Project uploaded succesfully";
                } else {
                    $error = "Upload failed, please try again.";
                }

                header("Location: projectForm.php?uploadsuccess");

            } else {
                $error = "Your file is too big!";
            }
        } else {
            $error = "There was an error uploading your file!";
        }
    } else {
        $error = "You cannot upload files of this type!";
    }
}