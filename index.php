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
    
    <main class="container-fluid">
        <div class="hero text-center">
            <img class="w-50 mx-auto d-block" src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/20943391-scaled.jpg" alt="Hero image">
            <h1>Discover the best designers & creatives of Thomas More</h1>
            <p>
                Vibbar ++ is the most important destination to find & showcase creative work and give a voice to the design & develop students of Thomas More.
            </p>
            <div>
                <p><small class="text-muted">No account yet?</small></p>
                <a class="offcanvas-title btn btn-primary" href="register.php">Sign up</a>
            </div>
        </div>
    </main>
</body>

</html>