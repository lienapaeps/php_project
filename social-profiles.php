<?php

    include_once("bootstrap.php");
    session_start();

    if (isset($_GET["profile"])) {
        $key = $_GET["profile"];
    } else {
        $key = "default";
    }    

    $conn = DB::getConnection();
    $user = User::getUserById($key);

    if(isset($_POST["submitSocials"])){
        Social::setSocialLinks();
    }

    $links = Social::getSocialsFromUser($key);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account/Social Profiles | Vibar</title>

    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    <!-- Font: Museo Sans -->
    <link rel="stylesheet" href="https://use.typekit.net/kkv2fee.css">

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>
<body class="social-profiles__body">
    <?php include_once("header.inc.php"); ?>

    <div class="px-4 profile-edit__grid" style="margin-bottom: 8rem;">
        <div class="profile-edit__header container-fluid d-flex mb-8">
            <div class="profile-edit__header__picture">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-4" style="height: 80px; width: 80px;">
            </div>

            <div class="profile-edit__header__text">
                <h1 class="profile-edit__header__text__name fs-3"><?php echo "Username"; ?> <span class="fs-5">/</span><span class="fs-5">Social Profiles</span></h1>
                <p class="profile-edit__header__text__descr text-muted">Update here your social media profiles</p>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div class="dropdown mb-8 d-block w-100 hide-desktop">
            <a class="btn btn-outline-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Edit Profile
            </a>

            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                <li><a class="dropdown-item" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                <li><a class="dropdown-item active" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                <li><a class="dropdown-item text-danger" href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
            </ul>
        </div>


        <aside class="hide-mobile">
            <div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a class="nav-link" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                    <li class="nav-item"><a class="nav-link active" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                    <li class="nav-item"><a href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="nav-link text-danger">Delete Account</a></li>
                </ul>
            </div>
        </aside>


        <form action="" method="POST" class="mb-8 social-profiles__form">
            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-globe"></i></span>
                <input type="text" class="form-control" name="website" placeholder="Website url">
                <label for="website" style="margin-left: 35px;">
                    <?php if (!empty($links["portfolio"])) {
                            echo $links["portfolio"];
                        } else {
                            echo "<span class='text-muted'>Website url</span>";
                        }
                    ?>
                </label>
            </div>
            
            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-linkedin"></i></span>
                <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                <label for="linkedin" style="margin-left: 35px;">
                <?php if (!empty($links["linkedin"])) {
                            echo $links["linkedin"];
                        } else {
                            echo "<span class='text-muted'>Linkedin url</span>";
                        }
                    ?>
                </label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-facebook"></i></span>
                <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                <label for="facebook" style="margin-left: 35px;">
                    <?php if (!empty($links["facebook"])) {
                            echo $links["facebook"];
                        } else {
                            echo "<span class='text-muted'>Facebook url</span>";
                        }
                    ?>
                </label>

            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-instagram"></i></span>
                <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                <label for="instagram" style="margin-left: 35px;">
                <?php if (!empty($links["instagram"])) {
                            echo $links["instagram"];
                        } else {
                            echo "<span class='text-muted'>Instagram url</span>";
                        }
                    ?>
                </label>

            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-behance"></i></span>
                <input type="text" class="form-control" name="behance" placeholder="Behance">
                <label for="behance" style="margin-left: 35px;">
                <?php if (!empty($links["behance"])) {
                            echo $links["behance"];
                        } else {
                            echo "<span class='text-muted'>Behance url</span>";
                        }
                    ?>
                </label>

            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-dribbble"></i></span>
                <input type="text" class="form-control" name="dribbble" placeholder="Dribbble">
                <label for="dribbble" style="margin-left: 35px;">
                <?php if (!empty($links["dribbble"])) {
                            echo $links["dribbble"];
                        } else {
                            echo "<span class='text-muted'>Dribbble url</span>";
                        }
                    ?>
                </label>

            </div>

            <div class="form-floating input-group mb-3">
                    <span class="input-group-text" style="width: 35px;"><i class="bi bi-github"></i></span>
                <input type="text" class="form-control" name="github" placeholder="Github">
                <label for="github" style="margin-left: 35px;">
                <?php if (!empty($links["github"])) {
                            echo $links["github"];
                        } else {
                            echo "<span class='text-muted'>Github url</span>";
                        }
                    ?>
                </label>

            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-stack-overflow"></i></span>
                <input type="text" class="form-control" name="stackOverflow" placeholder="Stack Overflow">
                <label for="stackOverflow" style="margin-left: 35px;">
                <?php if (!empty($links["stackoverflow"])) {
                            echo $links["stackoverflow"];
                        } else {
                            echo "<span class='text-muted'>Stack Overflow url</span>";
                        }
                    ?>
                </label>

            </div>


            <input type="submit" name="submitSocials" value="Save social profiles" class="btn btn-primary d-block w-100">
        </form>
    </div>

    <?php include_once("footer.inc.php"); ?>
</body>
</html>