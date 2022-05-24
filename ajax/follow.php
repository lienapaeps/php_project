<?php
    require_once('../bootstrap.php');

    if(isset($_GET["profile"])){
        $key = $_GET["profile"];
    } 
    else {
        $key = $_SESSION["user"]["id"];
    }


    if( !empty($_POST) ) {
        $follow = $_POST['follow'];

        try {
            $f = User::followUser();

            // success
            $result = [
                "status" => "success",
                "message" => "Comment was saved.",
                "data" => [
                    "follow"  => $follow
                ]
            ];

        } catch( Throwable $t ) {
            // error
            $result = [
                "status" => "error",
                "message" => "Something went wrong."
            ];
        }

        echo json_encode($result);

    }