<?php 
    include_once("bootstrap.php");

    session_start();

    // variable loggedin is used to see if user is logged in or not
    if (isset($_SESSION["user"])) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }

    $projectId = $_GET["id"];
    $project = Project::getById($projectId);
    $user = User::getUserById($project["user_id"]);

    if(!empty($_POST)) {
        // code here to update the project
        Project::updateProject($projectId, $_POST["project_title"], $_POST["project_body"], $_POST["project_tags"]);
        header("Location: project.php?id=$projectId");
    }

    // Delete project => works
    if(isset($_GET['delete'])) {
        if($_GET['delete'] == 'true') {
            Project::deleteProject($projectId);
            header("Location: profile.php");
        }
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
                <!-- DELETE button with popup for confirmation -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-trash me-2"></i>
                    Delete project
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-4" id="exampleModalLabel">Whoooops, you are deleting your project</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                            <img src="./assets/img/png/Middel 1@3x.png" alt="Alert vector image" style="width: 50%;" class="mb-4">
                            <h5 class="mb-2">Are you sure that you want to delete this project?</h5>
                        </div>
                        <div class="modal-footer">
                            <a href="./project-edit.php?id=<?php echo $project['id'] ?>&delete=true" type="button" class="btn btn-outline-danger">Delete project!</a>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oh no, cancel pleaseeee</button>
                        </div>
                        </div>
                    </div>
                </div>
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
                <img src="<?php echo $project['cover_img']; ?>" alt="Project main image" class="img-fluid rounded mb-3">
            </div>

            <div class="project__body">
                <div class="form-floating mb-3">
                    <textarea 
                        name="project_body" 
                        class="form-control" 
                        id="project_body" 
                        style="height: 150px" 
                        value=""><?php echo $project['description']; ?></textarea>
                    <label for="project_body">Update here your text</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control form-control-lg" type="text" name="project_tags" id="project_tags" value="<?php echo $project['tags'] ?>">
                    <label for="project_tags">Update Tag</label>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </main>

    <?php include_once('footer.inc.php') ?>
</body>
</html>