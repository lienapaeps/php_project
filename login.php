<?php
include_once("bootstrap.php");

if (!empty($_POST)) {
    try {
        $user = new User();

        $email = "";

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
            $_SESSION['user'] = $user;
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

    <title>IMD Showcase | Log in</title>
</head>

<body>

    <section class="signin__form">

        <h1 class="form__title">Log in to ProjectName</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email adress</label>
                <input type="email" name="email" id="email" class="form-control" required">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required">
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
            <a href="register.php">Don't have a account? <span>Register now</span></a>
        </div>
    </section>

</body>

</html>

<!-- Admins:

email: lienapaeps@thomasmore.be
password: 1234567

email: jeffasseur@thomasmore.be
password: 1234567

email: rickyheylen@thomasmore.be
password: 1234567 -->