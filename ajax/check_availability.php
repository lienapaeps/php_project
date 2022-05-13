<?php
    // include_once("../bootstrap.php");   
    include_once("./classes/DB.php");

    $conn = DB::getConnection();

    if(!empty($_POST["username"])) {
        $statement = $conn->prepare("select * from users where username = :username");
        $statement->bindValue(":username", $_POST["username"]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<span style='color:red'>Sorry username already exists.</span>";
            echo "<script>$('#register-submit').prop('disabled',true);</script>";
        } else {
            echo "<span style='color:green'>Username available.</span>";
            echo "<script>$('#register-submit').prop('disabled',false);</script>";
        }

        // $count = $statement->fetchColumn();


        // $statement->execute();
        // // $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        // if($count > 0) {
        //     echo "<span style='color:red'>Sorry username already exists.</span>";
        //     echo "<script>$('#register-submit').prop('disabled',true);</script>";
        // } else{
        //     echo "<span style='color:green'>Username available.</span>";
        //     echo "<script>$('#register-submit').prop('disabled',false);</script>";
        // }
    }
?>