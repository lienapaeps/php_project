<?php
require_once('../bootstrap.php');

if (!empty($_POST)) {
    $comment = $_POST['comment'];

    try {
        $c = new Comment();
        $c->setComment($comment);
        $c->save();

        // success
        $result = [
            "status" => "success",
            "message" => "Comment was saved.",
            "data" => [
                "comment" => htmlspecialchars($comment)
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
