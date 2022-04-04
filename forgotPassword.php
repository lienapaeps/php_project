<?php

include_once("bootstrap.php");

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

    <title>IMD Showcase | Forgot Password</title>
</head>

<body>

    <section class="forgot__password__form">

        <a href="login.php" class="arrow__back"><i class="fa-solid fa-arrow-left"></i></a>

        <h1 class="form__title">Forgot password?</h1>
        <p>Enter the email adress you used when you joined and we'll send you instructions to reset your password.</p>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email adress</label>
                <input type="email" name="email" id="email" class="form-control" required">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Send reset instructions</button>
            </div>
        </form>
    </section>

</body>

</html>