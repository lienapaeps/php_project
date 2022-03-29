<header>
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"><i class="fas fa-bars align-middle"></i></span>
            </button>

            <a class="navbar-brand" href="index.php"><strong class="logo">Vibar</strong></a>

            <!-- offcanvas toggle menu for profile and log out -->
            <div id="nav__profile" class="signed-in d-flex align-items-center">
                <button class="btn d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <p class="me-2 fw-bolder hide-mobile">Username</p>
                    <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle me-2" style="height: 30px; width: 30px;">
                </button>

                <div class="offcanvas offcanvas-end" tab-index="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close text-reset justify-content-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <!-- code hieronder === INGELOGD -->
                    <div class="offcanvas-body d-inline-flex flex-column logged-in">
                        <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle mx-auto d-block" style="height: 50px; width: 50px;">
                        <h4 class="me-2 mb-4 fw-bolder text-center">Jef</h4>
                        <a href="profile.php" class="text-center my-2">Profile</a>
                        <a href="logout.php" id="btnLogout" class="btn btn-outline-secondary text-center my-2 w-50 mx-auto d-block">Log out</a>
                    </div>
                    <!-- code hierboven === INGELOGD -->

                    <!-- code hieronder === NIET Ingelogd -->
                    <div class="offcanvas-body d-inline-flex flex-column not-logged-in">
                        <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/01/Phoenix-logo-e1647853809997.png" alt="Avatar-Ricky" class="rounded-circle mx-auto d-block" style="height: 50px; width: 50px;">
                        <a href="logout.php" id="btnLogout" class="btn btn-outline-secondary text-center my-2 w-50 mx-auto d-block">Log in</a>
                    </div>
                    <!-- code hierboven === NIET Ingelogd -->
                </div>
            </div>
            

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                        <!-- <i class="fas fa-times"></i> -->
                    </button>
                    <a class="offcanvas-title" id="offcanvasNavbarLabel"><strong class="logo">Vibar</strong></a>
                </div>
                <div class="offcanvas-body align-items-center">
                    <form id="searchbar" class="d-flex searchbar mx-xl-4 mh-100" style="height: 40px">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary searchbar--btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 my-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>