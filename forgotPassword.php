<?php

include_once("bootstrap.php");

if(!empty($_POST)) {
    $email = $_POST['email'];
    $user = new User();
    $user = $user->findByEmail($email);
    if ($user) {
        if($user['email'] == $email || $user['backup_email'] == $email) {
            $message = "Check your email for a password reset link.";
            echo $message;
        } else {
            $message = "No user found with that email address.";
            echo $message;
        }
    }
    else {
        echo "No user found with that email address.";
    }
    // var_dump($user);
    // echo $user['email'];
    
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

    <script src="https://kit.fontawesome.com/ef10571a33.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>IMD Showcase | Forgot Password</title>
</head>

<body>

    <section class="forgot__password__form">

        <a href="login.php" class="arrow__back"><i class="bi bi-arrow-left"></i></a>

        <h1 class="form__title">Forgot password?</h1>
        <p>Enter your email adress and we'll send you an email with instructions to reset your password.</p>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            
            <div class="mb-3 form-floating">
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.be" required">
                <label for="email">Email adress</label>
            </div>

            <div class="alert-message alert alert-danger mb-3">
                <span>This email is not found</span>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="password-reset-token">Send reset instructions</button>
            </div>
        </form>
    </section>

</body>

</html>