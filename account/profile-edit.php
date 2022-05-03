<?php 
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1);

    include_once("../bootstrap.php");
    session_start();

    $user = User::getUserById($_SESSION["user"]["id"]);
    

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile-edit | Vibar</title>

    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="../css/style.css?<?php echo time() ?>">
    <!-- Font: Museo Sans -->
    <link rel="stylesheet" href="https://use.typekit.net/kkv2fee.css">

    <link rel="shortcut icon" href="../assets/img/Favicon.png" type="image/x-icon">
</head>

<body>
    <?php include_once("../header.inc.php"); ?>

    <div class="px-4 profile-edit__grid" style="margin-bottom: 8rem;">
        <div class="profile-edit__header container-fluid d-flex mb-8">
            <div class="profile-edit__header__picture">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-4" style="height: 80px; width: 80px;">
            </div>

            <div class="profile-edit__header__text">
                <h1 class="profile-edit__header__text__name fs-3"><?php echo "Username"; ?> <span class="fs-5">/</span><span class="fs-5">General</span></h1>
                <p class="profile-edit__header__text__descr text-muted">Update here your general information and profile picture</p>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div class="dropdown mb-8 d-block w-100 hide-desktop">
            <a class="btn btn-outline-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Edit Profile
            </a>

            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item active" href="profile-edit.php">Edit Profile</a></li>
                <li><a class="dropdown-item" href="password.php">Password</a></li>
                <li><a class="dropdown-item" href="social-profiles.php">Social Profiles</a></li>
            </ul>
        </div>

        <aside class="hide-mobile">
            <div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a class="nav-link active" href="profile-edit.php">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="password.php">Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="social-profiles.php">Social Profiles</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-danger">Delete Account</a></li>
                </ul>
            </div>
        </aside>

        <!-- Aparte form to change profile picture -->
        <form action="" method="post" class=" mb-4">
            <!--<img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-4" style="height: 80px; width: 80px;">-->
            <label for="profile_picture" class="mb-2">Upload here your new picture</label>
            <div class="d-flex justify-content-between">
                <input class="" type="file" name="profile_picture" id="profile_picture">
                <!-- button href="#" type="submit" class="btn btn-primary me-2">Upload new picture</button> -->
                <button href="#" type="submit" class="btn btn-outline-secondary">Delete</button>
            </div>
        </form>

        <!-- Form to change profile information -->
        <form action="" method="POST" class=" mb-8">
            <div class="mb-4 form-floating">
                <input type="email" name="profile_username" id="profile_username" class="form-control" placeholder="Joris Hens">
                <label for="profile_username">
                <?php   if(!empty($_SESSION["user"]["username"])) {
                                echo $_SESSION["user"]["username"];
                            } else { echo "Username";}
                    ?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input type="email" name="profile_emailTM" id="profile_emailTM" class="form-control" placeholder="r-nummer@student.thomasmore.be" disabled readonly>
                <label for="profile_emailTM">
                    <?php   if(!empty($_SESSION["user"]["email"])) {
                                echo $_SESSION["user"]["email"];
                            } else { echo "TM Email Adress";}
                    ?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input type="email" name="profile_email" id="profile_email" class="form-control" placeholder="name@example.be">
                <label for="profile_email">
                <?php   if(!empty($_SESSION["user"]["backup_email"])) {
                                echo $_SESSION["user"]["backup_email"];
                            } else { echo "Backup Email";}
                    ?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <textarea type="email" name="profile_email" id="profile_email" class="form-control" placeholder="Type here your bio" style="height: 100px"></textarea>
                <label for="profile_email">
                <?php   if(!empty($_SESSION["user"]["bio"])) {
                                echo $_SESSION["user"]["bio"];
                            } else { echo "Biography";}
                    ?>
                </label>
            </div>

            <input type="submit" name="submitInfo" value="Save Profile" class="btn btn-primary d-block w-100">
        </form>
    </div>

    <?php include_once("../footer.inc.php"); ?>
</body>
</html>