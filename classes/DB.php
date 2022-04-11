<?php
abstract class Db
{
    private static $conn;

    public static function getConnection()
    {
        if (self::$conn != null) {
<<<<<<< HEAD
            //echo "🚫";
=======
            // echo "🚫";
>>>>>>> 6b5d3cc2c9286454bf7f6352c5df77f82df359bb
            // connection found, return connection
            return self::$conn;
        } else {
            $config = parse_ini_file("config/config.ini");
            self::$conn = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_user'], $config['db_password']);
            return self::$conn;
        }
    }
}