<?php
    require './PHPMailerAutoload.php';
    include_once("bootstrap.php");

    if(!empty($_POST)) {
        $email = htmlspecialchars($_POST['email']);
        $user = new User();
        $userEmail = $user->findByEmail($email);

        if ($userEmail) {
            date_default_timezone_set('Etc/UTC');
            $linkToSend = $user->passwordReset($userEmail['id']);
            // echo $linkToSend;

            $smtpPort = 587;
            $mailSubject = "Hello " . $userEmail['username'] . ", you have requested a password reset";
            $mailAdress = $_POST['email'];
            $mailUser = $userEmail['username'];

            // sending mail with PHPMailer
            $mail = new PHPMailer;
            // $mail->isSendmail();
            $mail->isSMTP();
            $mail->setFrom('vibar.thomasmore@gmail.com', 'Vibar');
            $mail->addAddress($mailAdress, $mailUser);
            $mail->Subject = $mailSubject;
            $mail->Body = '<a href="' . $linkToSend . '">Reset your password</a>';
            $mail->AltBody = 'Copy and paste this link into your browser: ' . $linkToSend;

            // $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
            $mail->Host = 'tls://smtp.gmail.com';
            $mail->Port = $smtpPort;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'vibar.thomasmore@gmail.com';
            $mail->Password = 'vibar.thomasmore07';
            $mail->isHTML(true);

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                /*
                * echo "<br>";
                * var_dump($mail);
                */
            } else {
                echo 'Message has been sent to ' . $mailAdress;
                echo '<br>' . $mailUser;
                echo '<br>' . $mailSubject;
                echo '<br>' . $linkToSend;
            }
        }
        else {
            $alert = true;
        }
    }

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links to css and scripts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
    <!-- Font: Museo Sans -->
    <link rel="stylesheet" href="https://use.typekit.net/kkv2fee.css">


    <title>IMD Showcase | Forgot Password</title>
</head>

<body>
    <?php if (isset($_GET['error']) == "Link-expired" || isset($_GET['error']) == "Link-already-opened"): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Error!</strong> The link has expired. Enter your email below for a new link
    </div>
    <?php endif; ?>

    <section class="forgot__password__form">

        <a href="login.php" class="arrow__back"><i class="bi bi-arrow-left"></i></a>

        <h1 class="form__title">Forgot password?</h1>
        <p>Enter your email adress and we'll send you an email with instructions to reset your password.</p>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            
            <div class="mb-3 form-floating">
                <input type="email" name="email" id="email" class="form-control <?php if(isset($alert)){echo "border border-danger";} ?>" placeholder="name@example.be" required">
                <label for="email">Email adress</label>
            </div>

            <?php if(isset($alert)): ?>
                <div class="alert-message alert alert-danger mb-3">
                    <span>This email is not found</span>
                </div>
            <?php endif; ?>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="password-reset-token">Send reset instructions</button>
            </div>
        </form>
    </section>

</body>

</html>