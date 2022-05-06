<?php 
    include_once("bootstrap.php");
    //include_once("ProfileImgForm.inc.php");

    session_start();

    if (!isset($_GET["id"])) {
        header("Location: index.php");
    } else {
        $projectId = $_GET["id"];
        $project = Project::getById($projectId);
        $user = User::getUserById($project["user_id"]);
    }

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

    <main class="container-md project mt-4 mb-8" style="max-width: 939px;">
        <div class="project__header my-4">
            <h1 class="project__header__title mb-4"><?php echo $project['title']; ?></h1>
            
            <div class="project__header__user d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <img src="<?php if(!empty($user['profile_img'])){ echo $user['profile_img'];} else{ echo "./assets/img/home_banner.png"; }; ?>" alt="Profile picture" class="rounded-circle me-3" style="height: 60px; width: 60px; object-fit: cover;">
                    <div>
                        <h3 class="project__header__user__name"><?php echo $user['username']; ?></h3>
                        <a href="#" class="btn btn-outline-primary">Follow now</a>
                    </div>
                </div>


                <div class="project__header__editProject">
                    <?php if( $project['user_id'] == $_SESSION['user']['id'] ): ?>
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-pen me-2"></i>
                            Edit project
                        </a>
                    <?php else: ?>
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-heart me-2"></i>
                            Like
                        </a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>

        <div class="project__coverImg">
            <img src="<?php echo $project['cover_img'] ?>" alt="Project main image" class="img-fluid rounded mb-3">
        </div>
        
        <div class="project__body">
            <?php echo $project['description']; ?>
        </div>
    </main>

    <?php include_once('footer.inc.php') ?>
</body>
</html>