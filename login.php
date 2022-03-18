<?php
include_once("bootstrap.php");

if (!empty($_POST)) {
    try {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        if ($user->canLogin($user->getEmail(), $user->getPassword())) {
            session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <style>
        /* X-Small devices (portrait phones, less than 576px)
        No media query for `xs` since this is the default in Bootstrap */
        body {
            background-color: #eee;
            margin-left: 2em;
            margin-right: 2em;
            margin-top: 4em;
        }

        .signin__form {
            width: 100%;
            background-color: #fff;
            padding: 2em;
            border-radius: 6px;
        }

        .form__title {
            font-size: 1.5em;
        }

        .form__link {
            text-align: center;
        }

        /* Medium devices (tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .signin__form {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* X-Large devices (large desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .signin__form {
                width: 65%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <title>IMD Showcase | Log in</title>
</head>

<body>

    <section class="signin__form">

        <h1 class="form__title">Sign in to ProjectName</h1>

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
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check">
                    <label class="form-check-label" for="check">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Sign In</button>
            </div>
        </form>

        <div class="mt-3 form__link">
            <a href="register.php">Don't have a account? <span>Sign up now</span></a>
        </div>
    </section>

</body>

</html>