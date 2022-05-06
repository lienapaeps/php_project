<?php

include_once(__DIR__ . "/DB.php");

class Project
{
    // All the database fields of projects table to update a project!
    private $id;
    private $title;
    private $description;
    private $cover_img;
    private $user_id;

    // SETTERS en GETTERS voor de private elementen hierboven
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getCover_img()
    {
        return $this->cover_img;
    }

    public function setCover_img($cover_img)
    {
        $this->cover_img = $cover_img;

        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
    

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

    public static function updateProject($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update projects set description = :description where id = :id");
        $statement->bindParam(":id", $id);
        //$statement->bindParam(":title", $_POST["project_title"]);
        $statement->bindParam(":description", $_POST["project_description"]);
        //$statement->bindParam(":image", $_POST["project_image"]);
        //$statement->bindParam(":time", $_POST["project_time"]);
        $statement->execute();
    }
}

