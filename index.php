<?php
include_once("bootstrap.php");

session_start();

// variable loggedin is used to see if user is logged in or not
if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

// show a limited number of projects, in our case the limit is 20
if (!isset($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}

// 20 projects per page
$limit = 20;
// 1 - 1 = 0 --> 0 tot 20
// 2 - 1 = 1 --> 20 tot 40 
$start = ($page - 1) * $limit;

if (!isset($_GET["search"]) || $_GET["search"] == "" || $_GET["search"] == "all") {
    $projects = Project::getAll($start, $limit);
} else {
    $search = $_GET["search"];
    $projects = Project::search($search, $start, $limit);
}

$count = Project::countProjects(); // 100

$pages = ceil($count / $limit); // 100 / 20 = 5

$previous = $page - 1;
$next = $page + 1;

// gets the username from project
function getUser($id)
{
    $user = User::getUserById($id);
    $name = $user["username"];
    return $name;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Vibar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>

<body>

    <?php include_once("header.inc.php"); ?>

    <div class="container-fluid hero-empty-state py-4">
        <div class="hero-container text-center">
            <img class="w-50 mx-auto d-block hero-image" src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/20943391-scaled.jpg" alt="Hero image">
            <div class="hero-text">
                <h1 class="fw-bold mt-4">Discover the best designers & creatives of Thomas More</h1>
                <h5 class="fw-normal">
                    Vibar is the most important destination to find & showcase creative work and give a voice to the design & develop students of Thomas More.
                </h5>
                <?php if(!$loggedin): ?>
                <div class="hero-cta">
                    <p><small class="text-muted">No account yet?</small></p>
                    <a class="offcanvas-title btn btn-primary" href="register.php">Sign up</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <main class="dashboard container-fluid">

        <!-- empty state -->
        <?php if (empty($projects)) : ?>
            <div class="card bg-light rounded-3 d-flex justify-content-center text-center my-3" style="max-width: 24rem; height: 24rem;">
                <p>There is no content to show yet.</p>
            </div>
            <!-- end empty state -->

        <?php else : ?>
            <div class="card-deck" >
                <?php foreach ($projects as $project) : ?>
                    <div class="card my-4">
                        <a href="project.php?id=<?php echo htmlspecialchars($project["id"]); ?>">
                            <img class="card-img" src="uploads/<?php echo htmlspecialchars($project["cover_img"]); ?>" alt="Card image">
                        </a>
                        <div class="card-body">
                                <a href="project.php?id=<?php echo htmlspecialchars($project["id"]); ?>">
                                    <h5 class="card-title fs-4"><?php echo htmlspecialchars($project["title"]); ?></h5>
                                </a>
                                <a href="profile.php?profile=<?php echo htmlspecialchars($project["user_id"]); ?>" class="card-link">
                                    <?php echo htmlspecialchars(getUser($project["user_id"])); ?>
                                </a>
                                <a class="link-primary">#<?php echo htmlspecialchars($project['tags']); ?></a>            
                        </div>
                        <div class="card-footer">
                            <a href="#" class="like card-link like-project" 
                                data-project="<?php echo htmlspecialchars($project["id"]); ?>" 
                                data-user="<?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["id"];} else {"NULL";} ?>"
                                >
                                <i class="like bi bi-heart"
                                data-project="<?php echo htmlspecialchars($project["id"]); ?>" 
                                data-user="<?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["id"];} else {"NULL";} ?>"></i>
                                <span class="like" data-project="<?php echo htmlspecialchars($project["id"]); ?>" 
                                data-user="<?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["id"];} else {"NULL";} ?>">23</span>
                            </a>
                            <a href="#" class="card-link"><i class="bi bi-chat"></i> 101</a>
                            <a href="#" class="card-link"><i class="bi bi-eye"></i> 101</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- page navigation -->
            <div class="m-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item 
                        <?php if ($page <= 1) {
                            echo "disabled";
                        }; ?>">
                            <a class="page-link" href="index.php?page=<?php echo $previous; ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li class="page-item 
                            <?php if ($page == $i) {
                                echo "active";
                            }; ?>">
                                <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item 
                        <?php if ($page >= $pages) {
                            echo "disabled";
                        }; ?>">
                            <a class="page-link" href="index.php?page=<?php echo $next; ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    </main>

    <?php include_once("footer.inc.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>