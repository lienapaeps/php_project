<?php

include_once("bootstrap.php");
include_once(__DIR__ . "/classes/DB.php");

$conn = Db::getConnection();

$userId = isset($_GET['uid']) ? trim($_GET['uid']) : '';
$token = isset($_GET['token']) ? trim($_GET['token']) : '';
$passwordReqestId = isset($_GET['id']) ? trim($_GET['id']) : '';


//echo $userId;

$statement = $conn->prepare('select id, user_id, date_requested from password_reset_request where user_id = :user_id and id = :id and token = :token');

$statement->bindValue(":user_id", $userId);
$statement->bindValue(":id", $passwordReqestId);
$statement->bindValue(":token", $token);

$statement->execute(array(
    ":user_id" => $userId,
    ":id" => $passwordReqestId,
    ":token" => $token
));

$result = $statement->fetch(PDO::FETCH_ASSOC);

//var_dump($result);

if (!empty($result)) {
    $_SESSION['user_id'] = $userId;
}
else {
    $error = "Invalid password reset request";
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

    <title>IMD Showcase | Reset Password</title>
</head>

<body>
    
        <section class="reset__password__form">

            <h1 class="form__title">Reset your password</h1>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <fieldset <?php if( isset($error) ) { echo "disabled"; } ?> >
                    <div class="mb-3 form-floating">
                        <input type="password" name="password" id="password" class="form-control" placeholder="123456" required">
                        <label for="password" class="form-label">New Password</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="password" name="password__verify" id="password__verify" class="form-control" placeholder="123456" required">
                        <label for="password__verify" class="form-label">New Password Verify</label>
                    </div>

                    <div class="d-grid mb-3 gap-2">
                        <button class="btn btn-primary" type="submit" <?php if (isset($error)) {echo "disabled";} ?> >Reset password</button>
                    </div>
                </fieldset>

                <?php if ( isset($error) ): ?> 
                    <a role="button" class="d-block btn btn-danger mt-3 text-center" href="index.php">Go back to the homepage</a>
                <?php endif; ?>
            </form>
        </section>
    
</body>

</html>