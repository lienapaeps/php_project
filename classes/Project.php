<?php

include_once(__DIR__ . "/DB.php");

class Project
{ 

    // this function gets all projects from the database
    public static function getAll($start, $limit)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects order by time ASC limit $start, $limit"); // oud naar niew
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // this function counts the total of projects from the database
    public static function countProjects()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select count(*) from projects"); // 100
        $statement->execute();
        return $statement->fetchColumn();
    }

    // this function gets all projects from user with a certain id
    public static function getProjectsFromUser(int $id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects where user_id = :id");
        $statement->bindValue("id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getById($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects where id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProject($id, $project_title, $project_description) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update projects set title = :title, description = :description where id = :id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":title", $project_title);
        $statement->bindParam(":description", $project_description);
        //$statement->bindParam(":image", $_POST["project_image"]);
        $statement->execute();
    }

    public static function deleteProject($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("DELETE from projects where id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}

