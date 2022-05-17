<?php
include_once("bootstrap.php");

// variable loggedin is used to see if user is logged in or not
if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

// var_dump($_SESSION["user"]);

?>

<header>
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <h3 class="logo">Vibar</h3>
            </a>

            <div class="order-lg-last text-end">
                <button class="btn ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUser" aria-controls="offcanvasUser">
                    <?php if ($loggedin) : ?>
                        <p class="me-2 fw-bolder hide-mobile"><?php echo $_SESSION["user"]["username"]; ?></p>
                    <?php endif; ?>
                    <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-2" style="height: 30px; width: 30px;">
                </button>
            </div>

            <button class="navbar-toggler ms-2 order-first" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span data-bs-target="#offcanvasNavbar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </span>
            </button>

            <div id="offcanvasNavbar" class="offcanvas offcanvas-start offcanvas-light" data-bs-hideresize="true" tabindex="-1" aria-labelledby="offcanvasNavbarLabel" style="visibility: hidden;" aria-hidden="true">
                <div class="offcanvas-header">
                    <h3 id="offcanvasLabel" class="offcanvas-title logo">Vibar</h3>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <?php if ($loggedin) : ?>
                            <li class="nav-item">
                                    <a href="profile.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="nav-link">Profile</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider mb-3">
                        </li>
                        <?php if ($loggedin) : ?>
                        <li class="nav-item">
                            <a href="projectForm.php" class="fw-bold nav-link">Upload a project</a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider mb-3">

                        </li>
                    </ul>
                    <form class="d-flex mt-xs-3" action="" method="get">
                        <input class="form-control me-2" type="search" name="search" id="searchbar" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 18 18">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div id="offcanvasUser" class="offcanvas offcanvas-end" tabindex="-1" aria-labelledby="offcanvasUserLabel" style="visibility: hidden;" aria-modal="true" role="dialog">
        <div class="offcanvas-header">
            <!-- <h3 id="offcanvasUserLabel" class="offcanvas-title">Offcanvas-title</h3> -->
            <a href="profile.php" class="offcanvas-title d-flex align-content-center">
                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-2" style="height: 40px; width: 40px;">
                <h4 class="me-2 fw-bolder align-self-end">
                    <?php echo "Username"; ?>
                </h4>
            </a>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="list-group">
                <?php if ($loggedin === false) : ?>
                    <li class="list-group-item border-0 mx-0 p-0 mb-3">
                        <a href="login.php" class="btn btn-outline-primary d-block">Log in</a>
                    </li>
                <?php else : ?>
                    <!-- If logged in => show this -->
                    <li class="list-group-item border-0 mx-0 p-0 mb-3">
                        <a href="profile.php?profile=<?php echo $_SESSION["user"]["id"]; ?>" class="d-block text-center">Profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider mb-3">
                    </li>
                    <li class="list-group-item border-0 mx-0 p-0 mb-3">
                        <a href="account/profile-edit.php" class="d-block text-center">Edit Profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider mb-3">
                    </li>
                    <li class="list-group-item border-0 mx-0 p-0 mb-3">
                        <a href="logout.php" class="btn btn-outline-primary d-block">Log out</a>
                    </li>
                    <!-- If logged in => show this -->
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>