<?php
include_once("bootstrap.php");

session_start();

if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

    if(isset($_GET["profile"])){
        $key = $_GET["profile"];
    } 
    else {
        $key = $_SESSION["user"]["id"];
    }

$user = User::getUserById($key);

$projects = Project::getProjectsFromUser($key);

$links = Social::getSocialsFromUser($key);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vibar | <?php echo $user['username'] ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <!-- Fontawesome icons -->
        <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
            <!-- Own CSS file -->
        <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">

        <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
    </head> 

    <body class="profile__body">
        
        <?php include_once("header.inc.php"); ?>

        <section class="profile">
            <div class="profile__header">
                <div onclick="showForm" class="profile__imageBox ">
                    <?php if(isset($user["profile_img"])): ?>
                        <img src="<?php echo "uploads/" . $user["profile_img"] ?>" alt="profile image" style="border: none;" class="profile__image">
                    <?php else : ?>
                        <i class="bi bi-person-bounding-box"></i>
                    <?php endif; ?>
                </div>
                <div class="profile__mainInfo mx-4">
                    <div class="profile__username">
                        <h1><?php echo $user["username"]; ?></h1>
                    </div>
                    <?php if (empty($user["course"])) : ?>
                        <div class="profile__course"><span>No course added yet.</span></div>
                    <?php else : ?>
                        <div class="profile__course"><span><?php echo $user["course"]; ?></span></div>
                    <?php endif; ?>
                    <?php
                    if ($key == $_SESSION["user"]["id"]) : ?>
                        <div class="profile__edit">
                            <a href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="btn btn-outline-secondary">Edit Profile</a>
                        </div>
                    <?php endif; ?>
                </div>
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
                    <?php if (empty($projects)): ?>
                        <p class="nothing">No projects submitted.</p>
                    <?php else: ?>
                        <div class="card-deck">
                            <?php foreach ($projects as $project): ?>
                                <div class="card my-4">
                                    <a href="project.php?id=<?php echo htmlspecialchars($project["id"]); ?>">
                                        <img class="card-img" src="uploads/<?php echo htmlspecialchars($project["cover_img"]); ?>" alt="Card image">
                                    </a>
                                    <div class="card-body">
                                        <a href="project.php?id=<?php echo htmlspecialchars($project["id"]); ?>">
                                            <h5 class="card-title"><?php echo htmlspecialchars($project["title"]); ?></h5>
                                        </a>  
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="card-link like-project"><i class="bi bi-heart"></i> 101</a>
                                        <a href="#" class="card-link"><i class="bi bi-chat"></i> 101</a>
                                        <a href="#" class="card-link"><i class="bi bi-eye"></i> 101</a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                    <?php endif; ?>
                </div>

                <div class="profile__infos">
                    <div class="profile__info description-area">
                        <h2>Who am I?</h2>
                        <?php if (empty($user["bio"])) : ?>
                            <p class="profile__description">No bio added yet.</p>
                        <?php else : ?>
                            <p class="profile__description"><?php echo $user["bio"]; ?></p>
                        <?php endif; ?>
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
                <div class="profile__info contact-area">
                    <h2>Contact</h2>
                    <?php if(!empty($links["portfolio"])): ?>
                        <a href="<?php echo $links["portfolio"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-globe"></i>
                            <p class="link__text"><?php echo $links["portfolio"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["linkedin"])): ?>
                        <a href="<?php echo $links["linkedin"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-linkedin"></i>
                            <p class="link__text"><?php echo $links["linkedin"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["facebook"])): ?>
                        <a href="<?php echo $links["facebook"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-facebook"></i>
                            <p class="link__text"><?php echo $links["facebook"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["instagram"])): ?>
                        <a href="<?php echo $links["instagram"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-instagram"></i>
                            <p class="link__text"><?php echo $links["instagram"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["behance"])): ?>
                        <a href="<?php echo $links["behance"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-behance"></i>
                            <p class="link__text"><?php echo $links["behance"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["dribbble"])): ?>
                        <a href="<?php echo $links["dribbble"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-dribbble"></i>
                            <p class="link__text"><?php echo $links["dribbble"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["github"])): ?>
                        <a href="<?php echo $links["github"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-github"></i>
                            <p class="link__text"><?php echo $links["github"]; ?></p>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($links["stackoverflow"])): ?>
                        <a href="<?php echo $links["stackoverflow"]; ?>" target="_blank" class="profile__infoLink">
                            <i class="bi bi-stack-overflow"></i>
                            <p class="link__text"><?php echo $links["stackoverflow"]; ?></p>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </section>

    <?php include_once("footer.inc.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
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