<?php 
    include_once("bootstrap.php");

    session_start();

    $projectId = $_GET["id"];
    $project = Project::getById($projectId);
    $user = User::getUserById($project["user_id"]);

    if(!empty($_POST)) {
        var_dump($_POST);
        Project::updateProject($projectId);
    }


?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-edit | Vibar</title>

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

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>
<body>
    <?php include_once('header.inc.php'); ?>

    <main class="container-md project mt-4 mb-8" style="max-width: 939px;">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit your project</h1>
            <div>
                <a href="#" class="btn btn-outline-danger">
                    <i class="bi bi-trash me-2"></i>
                    Delete project
                </a>
            </div>
        </div>

        <form action="" method="post" class="mb-8">
            <div class="project__header my-4">
                <div class="mb-3 form-floating">
                    <input type="text" name="project_title" id="project_title" class="form-control form-control-lg" placeholder="Type here your title" value="<?php echo $project['title'] ?>">
                    <label for="project_title">Project Title</label>
                </div>
            </div>

            <div class="project__coverImg">
                <div class="mb-3">
                    <label for="project_cover" class="form-label">Update cover image</label>
                    <input class="form-control" type="file" id="project_cover" name="project_cover" value="<?php echo $project['cover_img']; ?>">
                </div>
                <img src="<?php echo $project['cover_img'] ?>" alt="Project main image" class="img-fluid rounded mb-3">
            </div>

            <div class="project__body">
                <div class="form-floating mb-3">
                    <textarea 
                        name="project_body" 
                        class="form-control" 
                        id="project_body" 
                        style="height: 150px" 
                        value="">
                        <?php echo $project['description']; ?>
                    </textarea>
                    <label for="project_body">Update here your text</label>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </main>

    <?php include_once('footer.inc.php') ?>
</body>
</html>