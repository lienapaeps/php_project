<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once("bootstrap.php");

session_start();

if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $message = $_POST["message"];
    $id = $_GET["id"];
    $type = $_GET["type"];
    $reported_user_id = Project::getUserFromProject($id);
    $userId = $_SESSION["user"]["id"];
    $reason = $_POST["reason"];

    Report::reportItem($message, $id, $type, $reported_user_id, $userId, $reason);
    header("Location: project.php?id=" . $id);
} 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporting | Vibar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">

    <link rel="shortcut icon" href="assets/img/Favicon.png" type="image/x-icon">
</head>

<body>
    <?php include_once('header.inc.php') ?>

    <main class="d-flex-column mx-4 pt-4">
        <div class="header--report">
            <h1 class="text-danger">Are you sure want to report this item?</h1>
            <p class="text-secondary"><i class="bi bi-exclamation-triangle me-2"></i>This action might cause implication for the reported user.</p>
        </div>
        <form action="" method="post" class="my-4">
            <?php if(isset($reportMsg)): ?>
                <div class="alert alert-secondary" role="alert">
                    <?php echo $reportMsg; ?>
                </div>
            <?php endif ?>
            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Reason</label>
                </div>
                <select class="custom-select w-50" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Inappropriate content</option>
                    <option value="2">Offensive language</option>
                    <option value="3">Spam content</option>
                </select>
            </div>
            <div class="form-floating">
                <input class="form-control" name="reason" id="reason" placeholder="Reason"></input>
                <label for="reason">Message</label>
            </div>
            <input type="submit" class="btn btn-outline-danger mt-4" value="Report this <?php echo $_GET['type'] ?>"></input>
        </form>
        <p class="text-warning"><i class="bi bi-exclamation-triangle me-2"></i>Notice that repetitive false accusations will also be punished.</p>
    </main>

    <?php include_once('footer.inc.php') ?>

</body>

</html>