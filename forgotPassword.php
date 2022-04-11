<?php
    require './PHPMailerAutoload.php';
    include_once("bootstrap.php");

    if(!empty($_POST)) {
        $email = htmlspecialchars($_POST['email']);
        $user = new User();
        $userEmail = $user->findByEmail($email);

        if ($userEmail) {
            $linkToSend = $user->passwordReset($userEmail['id']);
            // echo $linkToSend;

            // sending mail with PHPMailer
            $mail = new PHPMailer(true);
            
            $smtpPort = 25;
            $mailSubject = "Hello " . $userEmail['username'] . ", you have requested a password reset";
            $mailAdress = $userEmail['email'];
            $mailUser = $userEmail['username'];

            //$mail->isSMTP();
            $mail->isSendmail();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'localhost';
            $mail->Port = $smtpPort;
            $mail->SMTPAuth = true;
            $mail->isHTML(true);
            $mail->addAddress($mailAdress, $mailUser);
            $mail->isHTML(true);
            $mail->Subject = $mailSubject;
            $mail->Body = '<a href="' . $linkToSend . '">Reset your password</a>';
            $mail->AltBody = 'Copy and paste this link into your browser: ' . $linkToSend;

            $mail->setFrom('from@example.com', 'Mailer');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css?<?php echo time() ?>" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ef10571a33.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>IMD Showcase | Forgot Password</title>
</head>

<body>
    <?php if (isset($_GET['error']) == "Link-expired"): ?>
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