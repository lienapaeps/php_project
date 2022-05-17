<?php
    include_once("bootstrap.php");

    if (!empty($_POST)) {
        try {
            $user = new User();

            if (str_ends_with($_POST['email'], "@student.thomasmore.be") && str_ends_with($_POST['email'], "@thomasmore.be")) {
                $user->setEmail($_POST['email']);
                $email = $user->getEmail();
            } else {
                $user->setBackupEmail($_POST['email']);
                $email = $user->getBackupEmail();
            }

            $user->setPassword($_POST['password']);

            $password = $user->getPassword();

            if ($user->canLogin($email, $password)) {
                session_start();
                $_SESSION['user'] = $user->findByEmail($email);
                header("Location: index.php");
            }
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

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">

    <title>Log in | Vibar</title>
</head>

<body style="min-height: 100vh;" class="login-grid">

    <?php include_once("header.inc.php"); ?>

    <section class="login-header">
        <h1 class="logo fs-1 hide-desktop">Log in</h1>
        <div class="login-header__banner">
            <img src="./assets/img/home_text.png" alt="img text IMD branding" class="login-header__banner__textimg">
        </div>
    </section>

    <section class="signin__form mb-3">

        <h1 class="form__title mb-3 hide-mobile">Log in</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <div class="form__main">
            <form action="" method="POST">
                <div class="mb-3 form-floating">
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.be" required">
                    <label for="email">Email adress</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" name="password" id="password" class="form-control" placeholder="123456" required">
                    <label for="password">Password</label>
                </div>
                <div class="mb-3 form__link__password">
                    <a href="forgotPassword.php">Forgot password?</a>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Log In</button>
                </div>
            </form>

            <div class="mt-3 form__link">
                <a href="register.php">Don't have a account? <u>Register now</u></a>
            </div>
        </div>
    </section>

</body>

</html>