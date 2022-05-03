<?php 
    include_once("bootstrap.php");
    include_once("ProfileImgForm.inc.php");

    session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibar | Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
</head>
<body>
    <?php include_once('header.inc.php') ?>

    <main class="container-md project">
        <div class="project__header mb-3">
            <h1 class="project__header__title mb-3">Audi e-tron GT — showcase</h1>
            
            <div class="project__header__user d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <img src="https://autotijd.be/images/audi/2021/e-tron-gt/prijzen/audi-e-tron-gt-2021-prijzen-01.jpg" alt="Profile picture" class="rounded-circle me-3" style="height: 60px; width: 60px;">
                    <div>
                        <h3 class="project__header__user__name">Username</h3>
                        <a href="#" class="btn btn-outline-primary">Follow now</a>
                    </div>
                </div>

                <div class="project__header__editProject">
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-pen me-1"></i>
                        Edit project
                    </a>
                </div>
                
            </div>
        </div>
        <img src="https://autotijd.be/images/audi/2021/e-tron-gt/prijzen/audi-e-tron-gt-2021-prijzen-01.jpg" alt="Project main image" class="img-fluid rounded mb-3">
        <div class="project__body">
            Hier komt de body van het Project
        </div>
    </main>

    <?php include_once('footer.inc.php') ?>
</body>
</html>