<?php
    include_once('../bootstrap.php');

    if(!empty($_POST)) {
        $projectId = $_POST['projectId'];
        $userId = $_POST['userId'];
        
        try {
            $like = new Like();
            $like->setProjectId($projectId);
            $like->setUserId($userId);
            $like->save();

            $response = [
                'status' => 'success',
                'message' => 'Like saved successfully'
            ];
        } catch (Throwable $e) {
            $response = [
                'status' => 'error',
                'message' => "like failed to save"
            ];
        }
        
        echo json_encode($response);
    }