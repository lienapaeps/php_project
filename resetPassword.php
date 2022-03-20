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

        .reset__password__form {
            width: 100%;
            background-color: #fff;
            padding: 2em;
            border-radius: 6px;
        }

        .form__title {
            font-size: 1.5em;
        }

        /* Medium devices (tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .reset__password__form {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* X-Large devices (large desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .reset__password__form {
                width: 65%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <title>IMD Showcase | Reset Password</title>
</head>

<body>

    <section class="reset__password__form">

        <h1 class="form__title">Reset your password</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required">
            </div>
            <div class="mb-3">
                <label for="password__verify" class="form-label">Password Verify</label>
                <input type="password" name="password__verify" id="password__verify" class="form-control" required">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Reset password</button>
            </div>
        </form>
    </section>

</body>

</html>