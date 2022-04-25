<?php
include_once("bootstrap.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/d5a678d06c.js" crossorigin="anonymous"></script>
    <!-- Own CSS file -->
    <link rel="stylesheet" href="css/style.css?<?php echo time() ?>">
</head>

<body>

    <?php include_once("header.inc.php"); ?>

    <main class="dashboard container">
        <h1>Upload your project</h1>

        <form action="" method="POST" class="mx-4">

            <!-- cover img  -->
            <!-- img -->
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Browse images</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
            <!-- title  -->
            <div class="mb-3 form-floating">
                <input type="text" name="project_title" id="project_title" class="form-control" placeholder="Type here your title" required">
                <label for="project_title">Project title</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea type="text" name="project_description" id="project_description" class="form-control" placeholder="Type here your description"" style=" height: 100px"></textarea>
                <label for="project_description">Description</label>
            </div>
            <!-- tags  -->
            <div class="mb-3 form-floating">
                <input type="text" name="project_tags" id="project_tags" class="form-control" placeholder="Type here your title" required">
                <label for="project_tags">Tags</label>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </main>

    <?php include_once("footer.inc.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>