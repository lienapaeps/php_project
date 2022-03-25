<?php

    include_once("ProfileImgForm.inc.php");

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Name</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <!-- Fontawesome icons -->
        <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
            <!-- Own CSS file -->
        <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    </head> 

    <body class="profile__body">
        
        <?php include_once("header.inc.php"); ?>

        <section class="image-upload__form border center col-6 offset-md-4">
            <h1 class="image-form__title">Upload a profile picture</h1>
    
            <?php if (isset($errorImage)): ?>
                <div class="alert alert-danger"><?php echo $errorImage ?></div>
            <?php endif; ?>
            <?php if (isset($errorFileType)): ?>
                <div class="alert alert-danger"><?php echo $errorFileType ?></div>
            <?php endif; ?>
            <?php if (isset($succesImage)): ?>
                <div class="alert alert-succes"><?php echo $succesImage ?></div>
            <?php endif; ?>
            <?php if (isset($errorFileExists)): ?>
                <div class="alert alert-danger"><?php echo $errorFileExists ?></div>
            <?php endif; ?>

            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 form-group">
                    <label for="profileImgUpload">Please pick a file not larger than 500kb:</label>
                    <input type="file" name="profileImgUpload" id="profileImgUpload" class="image-form__upload form-control">
                </div>
                <div class="d-grid gap-2 form-group">
                    <button class="btn btn-primary" type="submit" name="submitProfileImage">Upload</button>
                    <a class="form-cancel btn btn-danger" onclick="hideForm">Cancel</a>
                </div>
            </form>
    
        </section>
        <section class="profile">
            <div class="profile__header row">
                <div class="profile__imageBox col-sm-4 col-md-3 col-lg-3">
                    <img onclick="showForm" src="<?php echo $target; ?>" alt="profile image" class="profile__image">
                </div>
                <div class="profile__mainInfo col-sm-8 col-md-9 col-lg-9">
                    <div class="profile__username"><h1>Username</h1></div>
                    <div class="profile__course"><span>Interactive Multimedia Design</span></div>
                    <div class="profile__description"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed id, molestiae voluptatibus est excepturi quod aliquam, ex quisquam neque ab illum atque iure ut maiores laboriosam sit nostrum odit laudantium.</p></div>
                </div>
                <div class="edit_button"></div>
            </div>
            <div class="profile__nav row">
                <a href="#" class="profile__link col-4 border "><span>Profile Info</span></a>
                <a href="#" class="profile__link col-4 border "><span>Projects</span></a>
                <a href="#" class="profile__link col-4 border "><span>Following</span></a>
            </div>
            <div class="profile__main border-rounded">
                <div class="empty__state">
                    <span>This user has no projects on display.</span>
                    <img src="" alt="">
                </div>
            </div>
        </section>
        
        <?php include_once("footer.inc.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let imageForm = document.querySelector(".image-upload__form");
        
        document.querySelector(".profile__image").addEventListener("click", showForm);
        document.querySelector(".form-cancel").addEventListener("click", hideForm);

        function showForm() {
            imageForm.style.display = "block";
        }
        function hideForm() {
            imageForm.style.display = "none";
        }

    </script>
</body>
</html>