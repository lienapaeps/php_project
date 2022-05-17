<?php

include_once(__DIR__ . "/DB.php");

class Report {

    public static function getReport($id)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from reported where content_id = :id"); // oud naar niew
        $statement->bindValue("id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllWarnedContent() {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from comments, users, projects where warned = :w");
        $statement->bindValue("w", true);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function reportItem($message, $content_id, $content_type, $reported_user, $reporter, $reason) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into reported (time, message, content_id, content_type, reported_user, reporter, reason) values (:time, :message, :content_id, :content_type, :reported_user, :reporter :reason)");
        $statement->bindValue("time", date("Y-m-d h:i:sa"));
        $statement->bindValue("message", $message);
        $statement->bindValue("content_id", $content_id);
        $statement->bindValue("content_type", $content_type);
        $statement->bindValue("reported_user", $reported_user);
        $statement->bindValue("reporter", $reporter);
        $statement->bindValue("reason", $reason);
        $statement->execute();

        $statement = $conn->prepare("update projects set warned = :warned where id = :id");
        $statement->bindValue("id", $content_id);
        $statement->bindValue("warned", true);
        $statement->execute();
    }

}