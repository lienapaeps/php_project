<?php
    include_once('../bootstrap.php');

    session_start();

    if(!empty($_POST)) {
        $like = new Like();
        $like->setProjectId($_POST['projectId']);
        $like->setUserId($_POST['userId']);

        if($like->checkLiked() < 2 && $like->checkLiked() !== 1) {
            if($like->save()) {
                $amount = $like->countLikes($_POST['projectId']);
                $response = [
                    'status' => 'success',
                    'amount' => $amount
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Like project failed!'
                ];
            }
            
            echo json_encode($response);
        }
    }
?>