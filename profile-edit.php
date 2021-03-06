<?php

include_once("bootstrap.php");
session_start();

if(isset($_GET["profile"])){
    $key = $_GET["profile"];
} 
else {
    $key = $_SESSION["user"]["id"];
}

$user = User::getUserById($key);

$uploadStatusMsg = "";

//upload file to server
if (isset($_POST['submitPFP'])) {
    User::uploadProfilePicture($_SESSION["user"]["id"],$_FILES['profile_picture']);
} else {
    $uploadStatusMsg = "";
}

if(isset($_POST["submitInfo"])){
    User::editProfileInfo($_POST["profile_username"], $_POST["profile_email"], $_POST["profile_bio"], $_POST["profile_course"], $_SESSION["user"]["id"]);
} else {
    $uploadStatusMsg = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit | Vibar</title>

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
                <img src="<?php echo "uploads/" . $user["profile_img"] ?>" alt="profile image" class="rounded-circle me-4" style="height: 80px; width: 80px; object-fit: cover;">
            </div>

            <div class="profile-edit__header__text">
                <h1 class="profile-edit__header__text__name fs-3"><?php echo $user['username']; ?> <span class="fs-5">/</span><span class="fs-5">General</span></h1>
                <p class="profile-edit__header__text__descr text-muted">Update here your general information and profile picture</p>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div class="dropdown mb-8 d-block w-100 hide-desktop">
            <a class="btn btn-outline-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Edit Profile
            </a>

            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item active" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                <li><a class="dropdown-item" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                <li><a class="dropdown-item" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                <li><a class="dropdown-item text-danger" href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Delete Profile</a></li>
            </ul>
        </div>


        <aside class="hide-mobile">
            <div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a class="nav-link active" href="profile-edit.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="password.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="social-profiles.php?profile=<?php echo $_SESSION["user"]["id"]; ?>">Social Profiles</a></li>
                    <li class="nav-item"><a href="profile-delete.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="nav-link text-danger">Delete Profile</a></li>
                </ul>
            </div>
        </aside>

        <!-- Aparte form to change profile picture -->
        <form action="" method="post" class=" mb-4" enctype="multipart/form-data">
        <?php if($uploadStatusMsg): ?>
            <div class="alert alert-secondary" role="alert">
                <?php echo $uploadStatusMsg; ?>
            </div>
        <?php endif; ?>
            <!--<img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-4" style="height: 80px; width: 80px;">-->
            <label for="profile_picture" class="mb-2">Upload here your new picture</label>
            <div class="d-flex justify-content-between">
                <input class="" type="file" name="profile_picture" id="profile_picture">
                <button href="#" type="submit" name="submitPFP" class="btn btn-primary me-2">Upload new picture</button>
                <button href="#" type="submit" class="btn btn-outline-secondary">Delete</button>
            </div>
        </form>

        <!-- Form to change profile information -->
        <form action="" method="POST" class=" mb-8">
        <hr>

            <div class="mb-4 form-floating">
                <input value="<?php if(!empty($user["username"])){echo htmlspecialchars($user["username"]);};?>" type="text" name="profile_username" id="profile_username" class="form-control" placeholder="Joris Hens">
                <label for="profile_username">
                    <?php echo "<span class='text-muted'>Username</span>";?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input value="<?php if(!empty($user["course"])){echo htmlspecialchars($user["course"]);};?>" type="text" name="profile_course" id="profile_course" class="form-control" placeholder="Joris Hens">
                <label for="profile_course">
                    <?php echo "<span class='text-muted'>Course</span>"; ?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input value="<?php if(!empty($user["email"])){echo htmlspecialchars($user["email"]);};?>" type="email" name="profile_emailTM" id="profile_emailTM" class="form-control" placeholder="r-nummer@student.thomasmore.be" disabled readonly>
                <label for="profile_emailTM">
                    <?php echo "<span class='text-muted'>TM Email Adress</span>";?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input value="<?php if(!empty($user["backup_email"])){echo htmlspecialchars($user["backup_email"]);};?>" type="email" name="profile_email" id="profile_email" class="form-control" placeholder="name@example.be">
                <label for="profile_email">
                    <?php echo "<span class='text-muted'>Backup Email</span>";?>
                </label>
            </div>

            <div class="mb-4 form-floating">
                <input type="text" name="profile_bio" value="<?php if(!empty($user["bio"])){echo htmlspecialchars($user["bio"]);};?>" id="profile_bio" class="form-control" placeholder="Type here your bio"></input>
                <label for="profile_bio">
                    <?php echo "<span class='text-muted'>Biography</span>";?>
                </label>
            </div>

            <input type="submit" name="submitInfo" value="Save Profile" class="btn btn-primary d-block w-100">
        </form>
    </div>

    <?php include_once("footer.inc.php"); ?>
</body>

</html>