<?php
include_once("bootstrap.php");
// include_once("uploadProject.php");

//upload file to server

$error = false;
$errorMessage = "";

session_start();

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

                header("Location: projectForm.php?uploadsuccess");

            } else {
                $error = true;
                $errorMessage = "Your file is too big! Try to upload a smaller file.";
            }
        } else {
            $error = true;
            $errorMessage = "There was an error uploading your file! Try again.";
        }
    } else {
        $error = true;
        $errorMessage = "You cannot upload files of this type! Try to upload a jpg, jpeg, png, mp4 or gif file.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Upload | Vibar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>

<body>

    <?php include_once("header.inc.php"); ?>

    <main class="dashboard container">
        <h1>Upload your project</h1>

        <?php if(isset($_GET["uploadsuccess"])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo "Project uploaded succesfully!"; ?>
            </div>
        <?php endif; ?>

        <?php if(($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <div class="imgGallery">
            <!-- image preview -->
        </div>

        <form action="uploadProject.php" method="POST" enctype="multipart/form-data" class="mx-4 mb-8">

            <!-- cover img  -->
            <div class="mb-3">
                <label for="project_cover" class="form-label">Browse cover image</label>
                <input class="form-control" type="file" id="project_cover" name="project_cover" required>
            </div>
            <!-- title  -->
            <div class="mb-3 form-floating">
                <input type="text" name="project_title" id="project_title" class="form-control" placeholder="Type here your title" required>
                <label for="project_title">Project title</label>
            </div>
            <!-- description -->
            <div class="mb-3 form-floating">
                <textarea type="text" name="project_description" id="project_description" class="form-control" placeholder="Type here your description and tags" style=" height: 200px" required></textarea>
                <label for="project_description">Description and tags</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        </form>

    </main>

    <?php include_once("footer.inc.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function (event) {
                    $('.imgGallery').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }

        $("#project_cover").change(function () {
            imagePreview(this);
        });
    </script>
</body>

</html>