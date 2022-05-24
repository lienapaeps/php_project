<?php 
    include_once("bootstrap.php");
    //include_once("ProfileImgForm.inc.php");

    session_start();

    // variable loggedin is used to see if user is logged in or not
    if (isset($_SESSION["user"])) {
        $loggedin = true;
    } else {
        $loggedin = false;
        header("Location: index.php");
    }

    if (!isset($_GET["id"])) {
        header("Location: index.php");
    } else {
        $projectId = $_GET["id"];
        $project = Project::getById($projectId);
        $user = User::getUserById($project["user_id"]);
        $report = Report::getReport($projectId);
    }

    $comments = Comment::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project | Vibar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>
<body>
    <?php include_once('header.inc.php') ?>

    <main class="container-md project mt-4 mb-8" style="max-width: 939px;">
        <div class="project__header my-4">
            <h1 class="project__header__title mb-4"><?php echo htmlspecialchars($project['title']); ?></h1>
            <?php if($project["warned"] == true): ?>
                <span class="text-danger">This project has been marked as reported because of <?php $report["message"]; ?></span>
            <?php else: ?>
                <span class="text-success">Okay to read</span>
            <?php endif; ?>
            <div class="project__header__user d-flex justify-content-between lign-items-stretch mb-4">
                <div class="d-flex">
                    <img src="<?php if(!empty($user['profile_img'])){ echo "uploads/" . htmlspecialchars($user["profile_img"]);} else { echo "./assets/img/home_banner.png"; }; ?>" alt="Profile picture" class="me-3" style="height: 6em; width: 6em; object-fit: cover;">
                    <div>
                        <h3 class="project__header__user__name"><?php echo htmlspecialchars($user['username']); ?></h3>

                        <a href="#" class="btn btn-outline-primary">Follow now</a>
                    </div>
                </div>
                <div class="d-flex-column justify-content-evenly align-items-evenly">
                    <div class="project__header__editProject my-2">
                        <?php if( !isset($_SESSION['user'])): ?>
                            <a href="#" class="btn btn-primary pr-6">
                                <i class="bi bi-heart me-2"></i>
                                Like
                            </a>                     
                        <?php elseif($project['user_id'] == $_SESSION['user']['id']): ?>
                            <a href="project-edit.php?id=<?php echo $project['id']; ?>" class="btn btn-primary w-100">
                                <i class="bi bi-pen me-2"></i>
                                Edit project
                            </a>  
                        <?php endif; ?>
                    </div>
                    <div class="project__header__reportProject ">
                        <a href="reportForm.php?id=<?php echo $project['id']; ?>&type=project" class="btn btn-outline-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Report project
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <a href="#" style="z-index: 10;" class="btn btn-pink-outline like-project"
                    data-project="<?php echo htmlspecialchars($project["id"]); ?>" 
                    data-user="<?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["id"];} else {"NULL";} ?>"
                 >
                    <i class="bi bi-heart"></i>
                    <span>11</span>
                </a>
                <a href="#" class="btn btn-pink-outline">
                    <i class="bi bi-chat"></i> 
                    <span>101</span>
                </a>
                <a href="#" class="btn btn-pink-outline">
                    <i class="bi bi-eye"></i> 
                    <span>101</span>
                </a>
            </div>
        </div>
        <div class="project__body">
            <?php echo $project['description']; ?>
        </div>

        <div class="project__coverImg">
            <img src="uploads/<?php echo htmlspecialchars($project['cover_img']); ?>" alt="Project main image" class="img-fluid rounded mb-3">
        </div>
        
        <div class="project__body">
            <p><?php echo htmlspecialchars($project['description']); ?></p>
            <a class="project__tags">#<?php echo htmlspecialchars($project['tags']); ?></a>            
        </div>

        <div class="projects__comments">
            <div class="mt-3">
                <h4>Comments</h4>
            </div>
            <!-- form for new comment -->
            <form method="post" action="" id="form__comment" class="mt-3 mb-4 d-flex">
                <img src="uploads/<?php if(!empty($user['profile_img'])){ echo htmlspecialchars($user['profile_img']);} else{ echo "./assets/img/home_banner.png"; }; ?>" alt="Profile picture" class="rounded-circle me-3" style="height: 60px; width: 60px; object-fit: cover;">
                <input type="text" id="comment" name="comment" class="form-control" placeholder="Enter your comment...">
                <input data-user="<?php echo $_SESSION['user']['id']; ?>" data-project="<?php echo $project['id']; ?>" type="submit" id="addComment" class="btn btn-primary" value="Add comment"></input>
            </form>
            <!-- display comments  -->
            <?php if(!empty($comments)): ?>
                <?php foreach($comments as $comment): ?>
                <div class="project__comment">
                    <div class="mt-2 mb-2 d-flex">
                        <div>
                            <img src="uploads/<?php if(!empty($user['profile_img'])){ echo htmlspecialchars($comment['user_id']);} else{ echo "./assets/img/home_banner.png"; }; ?>" alt="Profile picture" class="rounded-circle me-3" style="height: 60px; width: 60px; object-fit: cover;">
                        </div>
                        <div>
                            <p class="mb-2"><strong><?php echo htmlspecialchars($comment['user_id']); ?></strong></p>
                            <p class="mb-2"><?php echo htmlspecialchars($comment["comment"]); ?></p>
                            <p class="mb-1"><small><?php echo htmlspecialchars($comment["time"]); ?></small></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <p>No comments yet</p>
            <?php endif; ?>
        </div>
</main>

<?php include_once('footer.inc.php') ?>

<script>
    $(document).ready(function() {
        $("#form__comment").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url: "ajax/save_comment.php",
                method: "POST",

            })

        });
    })
</script>

</body>
</html>