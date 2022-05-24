<?php

include_once(__DIR__ . "/DB.php");

class Project
{ 
    private $title;
    private $description;
    private $tags;
    private $cover_img;

    // Getters and Setters
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setCoverImg($cover_img)
    {
        $this->cover_img = $cover_img;
        return $this;
    }

    public function getCoverImg()
    {
        return $this->cover_img;
    }


    // this function gets all projects from the database
    public static function getAll($start, $limit)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects order by time ASC limit $start, $limit"); // oud naar niew
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function search($search, $start, $limit)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects where (title = :search) order by time ASC limit $start, $limit"); // oud naar niew 
        $statement->bindValue("search", $search);
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

    public static function getUserFromProject(int $id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select user_id from projects where id = :id"); 
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

    public function updateProject($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update projects set title = :title, description = :description, tags = :tags where id = :id");
        $statement->bindValue(":id", $id);
        $statement->bindParam(":title", $this->title);
        $statement->bindParam(":description", $this->description);
        $statement->bindParam(":tags", $this->tags);
        $statement->execute();
    }

    public static function deleteProject($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("DELETE from projects where id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}

