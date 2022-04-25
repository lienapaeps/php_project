<?php
    include_once("bootstrap.php");

    session_start();

    if (isset($_SESSION["user"])) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }

    if(isset($_GET["profile"])){
        $key = $_GET["profile"];
    } 
    else {
        $key = "default";
    }

    $user = User::getUserById($key);

    include_once("ProfileImgForm.inc.php");

    // try {
    //     if(!empty($_POST)) {
    //         $user->setBio($_POST["bio"]);
    //         $user->setCourse($_POST["course"]);
    //         $user->setBackupMail($_POST["backup"]);    
    //     }

    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Vibar</title>

    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    <!-- Font: Museo Sans -->
    <link rel="stylesheet" href="https://use.typekit.net/kkv2fee.css">

    <link rel="shortcut icon" href="./assets/img/Favicon.png" type="image/x-icon">
</head>

<body>
    <?php include_once("header.inc.php"); ?>

    <h1 class="mx-4">Edit profile</h1>

    <form class="form__upload" action="" method="POST" enctype="multipart/form-data">
        <div class="profile__imageBox mx-4">
            <?php if(isset($_POST["submitProfileImage"])): ?>
                <img src="<?php echo $target; ?>" alt="profile image" style="border: none;" class="profile__image">
            <?php else: ?>
                <i class="bi bi-person-bounding-box"></i>
            <?php endif; ?>
        </div>
        <div class="ms-4 mb-3 form-group profile__image__uploadLabel">
            <?php if(!empty($uploadStatusMsg)): ?>
                <label for="profileImgUpload" class="alert alert-danger mt-2"><?php echo $uploadStatusMsg ?></label>
            <?php endif; ?>
            <input type="file" name="profileImgUpload" id="profileImgUpload" class="image-form__upload form-control">
        </div>
        <!-- <input class="image-form__upload" type="file" name="profileImgUpload" id="profile_picture" style="max-width: 150px;"> -->
        <input type="submit" name="submitProfileImage" class="btn btn-primary ms-4 me-2" value="Upload"></input>
        <a href="#" name="deleteImageUpload" class=" btn btn-outline-secondary">Delete</a>
    </form>

    <form action="profile.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" method="POST" class="m-4">
        <div class="mb-3 form-floating">
            <input type="text" name="course" id="course" class="form-control"  value="<?php echo $user["course"]; ?>">
            <label for="course">Your study programme</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="email" name="profile_email" id="profile_email" class="form-control" value="<?php echo $user["backup_email"]; ?>">
            <label for="profile_email">Secondary email adress</label>
        </div>

        <div class="mb-3 form-floating">
            <textarea type="text" name="bio" id="bio" class="form-control" style="height: 100px" value="<?php echo $user["bio"]; ?>"></textarea>
            <label for="profile_email">Bio</label>
        </div>

        <input type="submit" name="submitProfileInfo" class="btn btn-primary me-2" value="Update profile info"></input>
        <a href="profile.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class=" btn btn-outline-secondary">Cancel</a>


    </form>

    <?php include_once("footer.inc.php"); ?>
</body>
</html>