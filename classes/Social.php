<?php

include_once(__DIR__ . "/DB.php");

class Social
{
    // this function gets all soical links from the database
    public static function getAll()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from social_links"); // oud naar niew
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // this function gets all social links from user with a certain id
    public static function getSocialsFromUser(int $id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from social_links where user_id = :id"); 
        $statement->bindValue("id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function setSocialLinks() {
        $conn = DB::getConnection();
        $statement = $conn->prepare("INSERT INTO social_links (user_id) values (:user_id) ON DUPLICATE KEY UPDATE user_id = :user_id");
        $statement->bindValue("user_id", $_SESSION["user"]["id"]);

        if(!empty($_POST["website"])){
            $statement = $conn->prepare("UPDATE social_links SET portfolio = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["website"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["linkedin"])){
            $statement = $conn->prepare("UPDATE social_links SET linkedin = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["linkedin"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["facebook"])){
            $statement = $conn->prepare("UPDATE social_links SET facebook = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["facebook"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["instagram"])){
            $statement = $conn->prepare("UPDATE social_links SET instagram = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["instagram"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["behance"])){
            $statement = $conn->prepare("UPDATE social_links SET behance = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["behance"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["dribbble"])){
            $statement = $conn->prepare("UPDATE social_links SET dribbble = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["dribbble"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["github"])){
            $statement = $conn->prepare("UPDATE social_links SET github = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["github"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }
        if(!empty($_POST["stackoverflow"])){
            $statement = $conn->prepare("UPDATE social_links SET stackoverflow = :url WHERE user_id = :id");
            $statement->bindValue(":url", $_POST["stackoverflow"]);
            $statement->bindValue(":id", $_SESSION["user"]["id"]);
        }

        $statement->execute();
    }
}

