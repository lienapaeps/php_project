<?php

include_once(__DIR__ . "/DB.php");

class Comment {
    private $comment;

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    //this function gets all the comments from the database
    public static function getAll() {
        $conn = DB::getConnection();
        $result = $conn->query("select * from comments order by id asc");
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    //this function saves a comment to the database
    public function save() {
        $conn = DB::getConnection();

        $time = date('Y-m-d H:i:s');

        $statement = $conn->prepare("insert into comments (comment, time, user_id, project_id) values (:comment, :time, :user_id, :project_id)");
        $statement->bindValue(':comment', $this->comment);
        $statement->bindValue(':time', $time);
        $statement->bindValue(':user_id', $_SESSION['user']['id']);
        $statement->bindValue(':project_id', $_GET['id']);
        return $statement->execute();
    }

}