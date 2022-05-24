<?php

include_once(__DIR__ . "/DB.php");

class Project
{ 
    private $title;
    private $description;
    private $tags;
    private $cover_img;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (empty($title)) {
            throw new Exception("Title cannot be empty.");
        }
        $this->title = $title;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        if (empty($description)) {
            throw new Exception("Description cannot be empty.");
        }
        $this->description = $description;

        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        if (empty($tags)) {
            throw new Exception("Tags cannot be empty.");
        }
        $this->tags = $tags;

        return $this;
    }

    public function getCover_img()
    {
        return $this->cover_img;
    }
    
    public function setCover_img($cover_img)
    {
        if (empty($cover_img)) {
            throw new Exception("Cover image cannot be empty.");
        }
        $this->cover_img = $cover_img;

        return $this;
    }

    public function save() {
        $date = date('Y-m-d H:i:s');
        
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into projects (title, description, tags, time, cover_img, user_id) values (:title, :description, :tags, :time, :cover_img, :user_id)");
        $statement->bindValue(':title', $this->title);
        $statement->bindValue(':description', $this->description);
        $statement->bindValue(':tags', $this->tags);
        $statement->bindValue(':time', $date);
        $statement->bindValue(':cover_img', $this->cover_img);
        $statement->bindValue(':user_id', $_SESSION['user']['id']);

        $statement->execute();
    }
    
    // this function gets all projects from the database
    public static function getAll($order, $start, $limit)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects order by time $order limit $start, $limit"); // oud naar niew
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function search($search, $start, $limit)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects where (title = :search) OR (tags = :search) order by time ASC limit $start, $limit"); // oud naar niew
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

