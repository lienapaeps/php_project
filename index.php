<?php

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Project</title>

    <!-- links to css and scripts -->
        <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
        <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include_once("header.inc.php");?>
    
    <div class="container-fluid hero-empty-state py-4 border-bottom">
        <div class="hero-container text-center">
            <img class="w-50 mx-auto d-block" src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/20943391-scaled.jpg" alt="Hero image">
            <h1 class="fw-bold">Discover the best designers & creatives of Thomas More</h1>
            <p>
                Vibbar ++ is the most important destination to find & showcase creative work and give a voice to the design & develop students of Thomas More.
            </p>
            <div>
                <p><small class="text-muted">No account yet?</small></p>
                <a class="offcanvas-title btn btn-primary" href="register.php">Sign up</a>
            </div>
        </div>
    </div>

    <main class="dashboard container">
        <ul class="nav nav-pills pb-4 my-4 overflow-scroll flex-nowrap justify-content-md-center">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">All</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Animation</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Branding</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Illustration</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Mobile</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-nowrap">Product Design</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Webdesign</a>
            </li>
        </ul>

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>

            <!-- Extra cards to check out responsiveness -->
            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>

            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>

            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>

            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>

            <div href="#" class="card bg-light rounded-3" style="max-width: 24rem;">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/Social-Media.png" class="card-image-top" alt="Card top image">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">djkfhkqsgkdfjhgksjghlskjfghksjghlsglsdfbhlkghlksfdjhvlfgj</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
            <!-- End of extra cards -->
        </div>
    </main>

    <?php include_once("footer.inc.php"); ?>

</body>

</html>