<?php

include_once(__DIR__ . "/DB.php");

class User
{
    private $username;
    private $email;
    private $password;

    // get value of username
    public function getUsername()
    {
        return $this->username;
    }

    // set value of username
    public function setUsername($username)
    {
        // username cannot be empty
        if (empty($username)) {
            throw new Exception("Username cannot be empty.");
        }

        $this->username = $username;

        return $this;
    }

    // get value of email
    public function getEmail()
    {
        return $this->email;
    }

    // set value of email
    public function setEmail($email)
    {
        // email cannot be empty
        if (empty($email)) {
            throw new Exception("Email cannot be empty.");
        }

        // email has to end with '@student.thomasmore.be' or '@thomasmore.be'
        if (!str_ends_with($email, "@student.thomasmore.be") && !str_ends_with($email, "@thomasmore.be")) {
            throw new Exception("Email format is invalid.");
        }

        $this->email = $email;

        return $this;
    }

    // get value of password
    public function getPassword()
    {
        return $this->password;
    }

    // set value of password
    public function setPassword($password)
    {
        // password length should be 6 or longer
        if (strlen($password) <= 6) {
            throw new Exception("Password must be longer than 5 characters.");
        }

        // password cannot be empty
        if (empty($password)) {
            throw new Exception("Password cannot be empty.");
        }

        $this->password = $password;
        return $this;
    }

    // this function checks if a user can login with the password and user provided
    public function canLogin($email, $password)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $hash = $user["password"];

        if (password_verify($password, $hash)) {
            // password is correct
            return true;
        } else {
            // password is incorrect
            return false;
        }

        return $this;
    }

    // this function saves the user in the database
    public function register()
    {
        $options = [
            'cost' => 13
        ];

        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password);");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $password);
        return $statement->execute();
    }

    // this function checks if email already excists in database
    public function checkEmail($email)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // email exists
            throw new Exception("This email already exists.");
        } else {
            // email does not exist
        }
    }
}
