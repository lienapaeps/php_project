<header>
    <nav class="navbar navbar-expand-xl bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"><i class="fas fa-bars align-middle"></i></span>
            </button>

            <a class="navbar-brand" href="index.php"><strong>Vibbar ++</strong></a>

            <a class="offcanvas-title btn btn-primary" href="login.php">Sign in</a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                        <!-- <i class="fas fa-times"></i> -->
                    </button>
                    <a class="offcanvas-title" id="offcanvasNavbarLabel"><strong>Vibbar ++</strong></a>
                </div>
                <div class="offcanvas-body">
                    <form id="searchbar" class="d-flex searchbar mx-xl-4">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary searchbar--btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>