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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
            <div class="profile__header">
                <div class="profile__imageBox ">
                    <img onclick="showForm" src="<?php echo $target; ?>" alt="profile image" class="profile__image">
                </div>
                <div class="profile__mainInfo ">
                    <div class="profile__username"><h1>Josefien Jacobs</h1></div>
                    <div class="profile__course"><span>Interactive Multimedia Design</span></div>
                </div>
                <div class="edit_button"></div>
            </div>

            <div class="profile__nav">
                <div class="profile__navBox">
                    <a href="#" class="profile__link" id="profilePersonalInfo"><span>Personal Info</span></a>
                    <a href="#" class="profile__link" id="profileProjects"><span>Projects</span></a>
                    <a href="#" class="profile__link" id="profileShowcase"><span>Showcase</span></a>
                </div>
            </div>
            <div class="profile__main">
                <div class="profile__showcase">
                    <p class="nothing">No showcase available.</p>
                </div>

                <div class="profile__projects">
                    <p class="nothing">No projects submitted.</p>
                </div>
                
                <div class="profile__infos">
                    <div class="profile__info description-area">
                        <h2>Who am I?</h2>
                        <p class="profile__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, est quae aliquam ipsa error recusandae, nobis dicta sed repellendus ea odit veniam quibusdam sit, doloremque deserunt delectus perferendis optio non!</p>
                        <p class="profile__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, est quae aliquam ipsa error recusandae, nobis dicta sed repellendus ea odit veniam quibusdam sit, doloremque deserunt delectus perferendis optio non!</p>
                    </div>
                    <div class="profile__info extra-area">
                        <h2>Information</h2>
                        <div class="extra__box">
                            <p class="extra__title">Projects uploaded</p>
                            <p class="extra__number">6</p>
                        </div>
                        <div class="extra__box">
                            <p class="extra__title">Following</p>
                            <p class="extra__number">34</p>
                        </div>
                        <div class="extra__box">
                            <p class="extra__title">Followers</p>
                            <p class="extra__number">27</p>
                        </div>
                        <div class="extra__box">
                            <p class="extra__title">Written comments</p>
                            <p class="extra__number">5</p>
                        </div>
                        <div class="extra__box">
                            <p class="extra__title">Total project likes</p>
                            <p class="extra__number">214</p>
                        </div>
                        <div class="extra__box">
                            <p class="extra__title">Most used tag</p>
                            <p class="extra__number">#design</p>
                        </div>
                        
                    </div>
                    <div class="profile__info contact-area">
                        <h2>Contact</h2>
                        <a href="#" class="profile__infoLink">
                            <i class="bi bi-envelope"></i>
                            <p class="link__text">josjacobs@gmail.com</p>
                        </a>
                        <a href="#" class="profile__infoLink">
                            <i class="bi bi-instagram"></i>
                            <p class="link__text">Josefien Jacobs</p>
                        </a>
                        <a href="#" class="profile__infoLink">
                            <i class="bi bi-facebook"></i>
                            <p class="link__text">@JosJacobs</p>
                        </a>
                        <a href="#" class="profile__infoLink">
                            <i class="bi bi-github"></i>
                            <p class="link__text">Josefien_code</p>
                        </a>
                    </div>

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

        document.querySelector("#profilePersonalInfo").addEventListener("click", (navigate) => {
            document.querySelector("#profilePersonalInfo").style.color = "var(--IMD_Blue)";
            document.querySelector("#profileProjects").style.color = "var(--Black)";
            document.querySelector("#profileShowcase").style.color = "var(--Black)";

            document.querySelector(".profile__infos").style.display = "grid";
            document.querySelector(".profile__projects").style.display = "none";
            document.querySelector(".profile__showcase").style.display = "none";
            
            navigate.preventDefault();
        });

        document.querySelector("#profileProjects").addEventListener("click", (navigate) => {
            document.querySelector("#profilePersonalInfo").style.color = "var(--Black)";
            document.querySelector("#profileProjects").style.color = "var(--IMD_Blue)";
            document.querySelector("#profileShowcase").style.color = "var(--Black)";

            document.querySelector(".profile__infos").style.display = "none";
            document.querySelector(".profile__projects").style.display = "block";
            document.querySelector(".profile__showcase").style.display = "none";

            navigate.preventDefault();
        });

        document.querySelector("#profileShowcase").addEventListener("click", (navigate) => {
            document.querySelector("#profilePersonalInfo").style.color = "var(--Black)";
            document.querySelector("#profileProjects").style.color = "var(--Black)";
            document.querySelector("#profileShowcase").style.color = "var(--IMD_Blue)";

            document.querySelector(".profile__infos").style.display = "none";
            document.querySelector(".profile__projects").style.display = "none";
            document.querySelector(".profile__showcase").style.display = "block";

            navigate.preventDefault();
        });




    </script>
</body>
</html>