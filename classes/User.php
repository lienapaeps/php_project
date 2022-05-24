<?php

include_once(__DIR__ . "/DB.php");

class User
{
    private $username;
    private $email;
    private $backupEmail;
    private $password;
    private $course;
    private $bio;

    public function setCourse($course)
    {
        // course cannot be empty
        if (empty($course)) {
            throw new Exception("Course cannot be empty.");
        }

        $this->course = $course;
    
        return $this;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setBio($bio) {
        // bio cannot be empty
        if (empty($bio)) {
            throw new Exception("Bio cannot be empty.");
        }

        $this->bio = $bio;
    
        return $this;
    }

    public function getBio()
    {
        return $this->bio;
    }

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

    // get value of backup email
    public function getBackupEmail()
    {
        return $this->backupEmail;
    }

    // set value of backup email
    public function setBackupEmail($backupEmail)
    {
        // backup email cannot be empty
        if (empty($backupEmail)) {
            throw new Exception("Email cannot be empty.");
        }

        $this->backupEmail = $backupEmail;

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
        if (strlen($password) < 5) {
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
        $statement = $conn->prepare("select * from users where email = :email OR backup_email = :email");
        $statement->bindValue(":email", $email);

        // $backupEmail = $this->getBackupEmail();
        // $statement->bindValue(":backup_email", $backupEmail);

        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // er is een onbestaande gebruiker ingevuld
            throw new Exception("We couldn't find an account matching the email and password you entered. Please check your email and password and try again.");
            return false;
        }

        $hash = $user["password"];

        if (password_verify($password, $hash)) {
            // password is correct
            return true;
        } else {
            // password is incorrect
            throw new Exception("Password is incorrect.");
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
        $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $password);
        return $statement->execute();
    }

    public function saveUserInfo()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update users set course = :course, bio = :bio where email = :email, backup_email = :backup");
        $statement->bindValue(":course", $this->course);
        $statement->bindValue(":bio", $this->bio);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":backup", $this->backupEmail);
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

    // this function checks if username already excists in database
    public function checkUsername($username)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where username = :username");
        $statement->bindValue(":username", $username);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // username exists
            throw new Exception("This username already exists.");
        } else {
            // username does not exist
        }
    }

    // Jef: Function for validating email when password was forgotten
    public function findByEmail($email)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare('select * from users where email = :email or backup_email = :backup_email');
        $email = htmlspecialchars($email);
        $statement->bindValue("email", $email);
        $statement->bindValue("backup_email", $email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);

        if ($user) {
            // email exists
            // echo "user exists";
            return $user;
        } else {
            // email does not exist
            return false;
        }
    }

    public function passwordReset($userId)
    {
        // generate token
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        // insert token and other values into database table password_reset_request
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into password_reset_request (user_id, date_requested, token) values (:user_id, :date_requested, :token) ");

        $statement->bindValue(":user_id", $userId);
        $statement->bindValue(":date_requested", date("Y-m-d H:i:s"));
        $statement->bindValue(':token', $token);

        $inserted = $statement->execute();

        $passwordRequestId = $conn->lastInsertId();

        if ($inserted) {
            // echo "inserted ✅";
            $verifyScript = "http://localhost:8888/Dev4-Joris/php_project/resetPassword.php";
            $linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&token=' . $token;
            return $linkToSend;
        } else {
            echo "not inserted ❌";
        }
    }
    // this function gets all from the user by id
    public static function getUserById(int $id)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where id = :id");
        $statement->bindValue("id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // this function gets the id from the user by username
    public static function getUserId($username)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select id from users where username = :username");
        $statement->bindValue("username", $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update users set username = :username, email = :email, backup_email = :backup_email, course = :course, bio = :bio where id = :id");
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":backup_email", $this->backupEmail);
        $statement->bindValue(":course", $this->course);
        $statement->bindValue(":bio", $this->bio);
        return $statement->execute();
    }

    public static function adjustPassword($id, $pw, $pw2)
    {

        $conn = DB::getConnection();
        $s = $conn->prepare("select password from users where id = :id");
        $s->bindValue("id", $id);
        $s->execute();
        $user = $s->fetch(PDO::FETCH_ASSOC);

        $hash = $user["password"];

        if (password_verify($pw, $hash)) {
            $options = [
                'cost' => 13
            ];

            $password = password_hash($pw2, PASSWORD_DEFAULT, $options);

            $conn = DB::getConnection();
            $statement = $conn->prepare("update users set password = :password where id = :id");
            $statement->bindValue(":password", $password);
            $statement->bindValue(":id", $id);
            $statement->execute();
        } else {
            return false;
        }
    }

    public static function uploadProfilePicture($id, $pfpFile)
    {
        $file = $pfpFile;

        $fileName = $_FILES['profile_picture']['name'];
        $fileTmpName = $_FILES['profile_picture']['tmp_name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileError = $_FILES['profile_picture']['error'];
        $fileType = $_FILES['profile_picture']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', "gif");

        //table projects
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    //query

                    $conn = DB::getConnection();
                    $statement = $conn->prepare("UPDATE users SET profile_img = :img where id = :id");
                    $statement->bindValue(':img', $fileNameNew);
                    $statement->bindValue(':id', $id);
                    $statement->execute();

                    if ($statement) {
                        $uploadStatusMsg = "Picture uploaded succesfully";
                        header("Location: profile.php?profile=" . $id);
                    } else {
                        $uploadStatusMsg = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $uploadStatusMsg = "Your file is too big!";
                }
            } else {
                $uploadStatusMsg = "Upload failed, please try again.";
            }
        } else {
            $uploadStatusMsg = "";
        }
    }

    public static function editProfileInfo($username, $backup, $bio, $course, $id) {
   
        $conn = DB::getConnection();
        $statement = $conn->prepare("UPDATE users SET username = :uname , backup_email = :mail, course = :course, bio = :bio where id = :id");
        $statement->bindValue(':mail', $backup);
        $statement->bindValue(':uname', $username);
        $statement->bindValue(':bio', $bio);
        $statement->bindValue(':course', $course);
        $statement->bindValue(':id', $id);
        $statement->execute();
    
        if($statement){
            $uploadStatusMsg = "Profile updated succesfully";
            header("Location: profile.php?profile=" . $id);
        } else {
            $uploadStatusMsg = "Failed to update profile.";
        }
    
    }


    public static function deleteAccount($id, $pw)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $hash = $user["password"];

        if(password_verify($pw, $hash)) {
            $conn = DB::getConnection();
            $statement = $conn->prepare("delete from users where id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();

            session_destroy();
            session_reset();
            header("Location: login.php");    
        } else {
            $error = "Password is incorrect.";
        }


    }

    public static function followUser($id, $userId, $time, $status)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into following (user_id, follow_id, time, status) values (:user_id, :follow_id, :time, :status)");
        $statement->bindValue(":user_id", $id);
        $statement->bindValue(":follow_id", $userId);
        $statement->bindValue(":time", $time);
        $statement->bindValue(":status", $status);
        $f = $statement->execute();
        return $f;
    }
}
