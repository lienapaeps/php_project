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

        .signup__form {
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
            .signup__form {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* X-Large devices (large desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .signup__form {
                width: 65%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <title>IMD Showcase | Sign up</title>

</head>

<body>

    <section class="signup__form">

        <h1 class="form__title">Sign up to ProjectName</h1>

        <div class="alert alert-danger">Here you can display errors</div>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email adress</label>
                <input type="email" name="email" id="email" class="form-control" required">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Sign Up</button>
            </div>
        </form>

        <div class="mt-3 form__link">
            <a href="login.php">Already have a account? <span>Sign in now</span></a>
        </div>
    </section>

</body>

</html>