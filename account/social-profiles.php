<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account / Social Profiles | Vibar</title>

    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
                <h1 class="profile-edit__header__text__name fs-3"><?php echo "Username"; ?> <span class="fs-5">/</span><span class="fs-5">Social Profiles</span></h1>
                <p class="profile-edit__header__text__descr text-muted">Update here your social media profiles</p>
            </div>
        </div>

        <!-- DROPDOWN MENU -->
        <div class="dropdown mb-8 d-block w-100 hide-desktop">
            <a class="btn btn-outline-secondary dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo "Social Profiles" ?>
            </a>

            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="profile-edit.php">Edit Profile</a></li>
                <li><a class="dropdown-item" href="password.php">Password</a></li>
                <li><a class="dropdown-item active" href="#">Social Profiles</a></li>
            </ul>
        </div>

        <aside class="hide-mobile">
            <div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a class="nav-link" href="profile-edit.php">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="password.php">Password</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Social Profiles</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-danger">Delete Account</a></li>
                </ul>
            </div>
        </aside>

        <form action="" method="POST" class="mb-8">
            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-facebook"></i></span>
                <input type="text" class="form-control" name="Facebook" placeholder="Facebook">
                <label for="Facebook" style="margin-left: 35px;">Facebook url</label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-instagram"></i></span>
                <input type="text" class="form-control" name="Instagram" placeholder="Instagram">
                <label for="Instagram" style="margin-left: 35px;">Instagram url</label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-behance"></i></span>
                <input type="text" class="form-control" name="Behance" placeholder="Behance">
                <label for="Behance" style="margin-left: 35px;">Behance url</label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-dribbble"></i></span>
                <input type="text" class="form-control" name="Dribbble" placeholder="Dribbble">
                <label for="Dribbble" style="margin-left: 35px;">Dribbble url</label>
            </div>

            <div class="form-floating input-group mb-3">
                    <span class="input-group-text" style="width: 35px;"><i class="bi bi-github"></i></span>
                <input type="text" class="form-control" name="Github" placeholder="Github">
                <label for="Github" style="margin-left: 35px;">Github url</label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-linkedin"></i></span>
                <input type="text" class="form-control" name="Linkedin" placeholder="Linkedin">
                <label for="Linkedin" style="margin-left: 35px;">Linkedin url</label>
            </div>

            <div class="form-floating input-group mb-3">
                <span class="input-group-text" style="width: 35px;"><i class="bi bi-stack-overflow"></i></span>
                <input type="text" class="form-control" name="Stack-Overflow" placeholder="Stack Overflow">
                <label for="Stack-Overflow" style="margin-left: 35px;">Stack Overflow url</label>
            </div>


            <input type="submit" value="Save social profiles" class="btn btn-primary d-block w-100">
        </form>
    </div>

    <?php include_once("../footer.inc.php"); ?>
</body>
</html>