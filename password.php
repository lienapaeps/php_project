<?php

    ini_set('display_errors', 1); ini_set('display_startup_errors', 1);

    include_once("bootstrap.php");
    session_start();

    // $msg = "<div class='alert alert-primary'>Fill in current password and new password.</div>";
    // if(!empty($_POST)) {
    //     try {
    //         $user = new User();
    //         $conn = DB::getConnection();
    //         if(!empty($_POST)) {
    //             $res = $conn->prepare("select * from users where id = :id");
    //             $res->bindValue(":id", $_SESSION["user"]["id"]);
    //             $res->execute();
    //             $row = $res->fetch(PDO::FETCH_ASSOC);
    //             var_dump($row);
    //             if($_POST["oldPW"] == $row["password"] && $_POST["newPW"] == $row["confirmPW"] ) {
    //                 $conn->prepare("UPDATE student set password= :pw' WHERE id= :id");
    //                 $conn->bindValue(":id", $_SESSION["user"]["id"]);
    //                 $conn->bindValue(":pw", $_POST["newPW"]);
    //                 $conn->execute();
    //                 $msg = "<div class='alert alert-succes'>Password changed successfully.</div>";
    //                 } else {
    //                  $msg = "<div class='alert alert-danger'>Password is not correct.</div>";
    //                 }
    //                 }
    
            // if($_POST["oldPW"] === $pw) {
            //     if(!empty($_POST["newPW"]) === !empty($_POST["confirmPW"])) {
            //         $user->changePassword($_POST["newPW"]);
            //         $msg = "<div class='alert alert-succes'>Password changed!</div>";
            //     } else {
            //         $msg = "<div class='alert alert-danger'>Passwords do not match!</div>";
            //     }
            // } else {
            //     $msg = "<div class='alert alert-danger'>Incorrect current password!</div>";
            // }
    
    //     } catch (Throwable $e) {
    //         $error = $e->getMessage();
    //     }
    // } 




?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account / Password | Vibar</title>

    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    <!-- Font: Museo Sans -->
    <link rel="stylesheet" href="https://use.typekit.net/kkv2fee.css">

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>
<body>
    <?php include_once("header.inc.php"); ?>

    <div class="px-4 profile-edit__grid" style="margin-bottom: 8rem;">
        <div class="profile-edit__header container-fluid d-flex mb-8">
            <div class="profile-edit__header__picture">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-4" style="height: 80px; width: 80px;">
            </div>

            <div class="profile-edit__header__text">
                <h1 class="profile-edit__header__text__name fs-3"><?php echo "Username"; ?> <span class="fs-5">/</span><span class="fs-5">Password</span></h1>
                <p class="profile-edit__header__text__descr text-muted">Manage your password</p>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div class="dropdown mb-8 d-block w-100 hide-desktop">
            <a class="btn btn-outline-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Edit Profile
            </a>

            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                <li><a class="dropdown-item active" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                <li><a class="dropdown-item" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                <li><a class="dropdown-item text-danger" href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
            </ul>
        </div>


        <aside class="hide-mobile">
            <div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a class="nav-link" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link active" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                    <li class="nav-item"><a href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="nav-link text-danger">Delete Account</a></li>
                </ul>
            </div>
        </aside>

        <form action="" method="POST" class="mb-8">
            <?php echo $msg; ?>


            <div class="mb-4 form-floating">
                <input type="password" name="oldPW" id="old-pw" class="form-control" required">
                <label for="profile_username">Old password</label>
            </div>
            <div class="mb-4 form-floating">
                <input type="password" name="newPW" id="new-pw" class="form-control" required">
                <label for="new-pw">New password</label>
                <p class="text-muted">Minimum 6 characters</p>
            </div>
            <div class="mb-4 form-floating">
                <input type="password" name="confirmPW" id="confirm-pw" class="form-control" required">
                <label for="confirm-pw">Confirm new password</label>
                <p class="text-muted">Must be the same</p>
            </div>


            <input type="submit" value="Change Password" class="btn btn-primary d-block w-100">
        </form>
    </div>

    <?php include_once("footer.inc.php"); ?>
</body>
</html>