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
        $_SESSION['user'] = $user->getUsername();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css?<?php echo time() ?>" rel="stylesheet">

    <title>IMD Showcase | Sign up</title>

</head>

<body>

    <section class="register__form">

        <h1 class="form__title">Register to Vibar</h1>

        <?php if (isset($error)): ?>
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