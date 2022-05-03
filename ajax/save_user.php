<?php
require_once('../bootstrap.php');

if (!empty($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $u = new User();
        $u->setUsername($username);
        $u->setEmail($email);
        $u->setPassword($password);
        $u->register();

        // success
        $result = [
            "status" => "success",
            "message" => "User was saved.",
            "data" => [
                "username" => htmlspecialchars($username)
            ]
        ];
    } catch (Throwable $t) {
        // error
        $result = [
            "status" => "error",
            "message" => "Something went wrong."
        ];
    }

    echo json_encode($result);
}
