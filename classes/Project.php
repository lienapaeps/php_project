<?php

include_once(__DIR__ . "/DB.php");

class Project
{
    // this function gets all projects from the database
    public static function getAll()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from projects order by time ASC"); // oud naar niew
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
