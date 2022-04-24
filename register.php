<?php

include_once("bootstrap.php");

if (!empty($_POST)) {
    try {
        $user = new User();

        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);

        $email = $user->getEmail();
        $username = $user->getUsername();

        $user->checkEmail($email);
        $user->checkUsername($username);

        $user->register();

        session_start();
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } catch (Throwable $e) {
        $error = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>IMD Showcase | Sign up</title>

</head>

<body class="register-grid">

    <header class="bg-pink">
        <nav class="navbar px-3 justify-content-center">
            <a href="/Dev4-Joris/php_project/index.php" class="navbar-brand">
                <h3 class="logo text-center">Vibar</h3>
            </a>
        </nav>
    </header>

    <section class="register-header">
        <h1 class="logo fs-1 hide-desktop">Register to Vibar</h1>
        <div class="register-header__banner">
            <img src="./assets/img/home_text.png" alt="img text IMD branding" class="register-header__banner__textimg">
        </div>
    </section>

    <section class="register__form mb-8">

        <h1 class="form__title hide-mobile">Register to Vibar</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3 form-floating">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required">
                <label for="username">Username</label>
            </div>

            <div class="mb-3 form-floating">
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.be" required">
                <label for="email">Email adress</label>
            </div>

            <div class="mb-3 form-floating">
                <input type="password" name="password" id="password" class="form-control" placeholder="123456" required">
                <label for="password">Password</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" value="" type="checkbox" name="agree" id="agree">
                <label for="agree" class="form-check-label">Creating an account means you are okay with our <a href="#">Terms of Service</a>, <a href="#">Privacy Policy</a>, and our default <a href="#">Notification Settings</a>.</label>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>

        </form>

        <div class="mt-3 form__link">
            <a href="login.php">Already have a account? <span style="text-decoration: underline;">Log in now</span></a>
        </div>
    </section>

</body>

</html>