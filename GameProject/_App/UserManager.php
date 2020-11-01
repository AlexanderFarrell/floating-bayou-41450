<?php

require_once __DIR__ . '/../_Data/DatabaseHandler.php';

class UserManager
{
    /**
     * @return mixed
     */
    public static function getLoggedInUser()
    {
        return (isset($_SESSION['loguser'])) ? $_SESSION['loguser'] : null;
    }

    private static function setLoggedInUser($user){
        $_SESSION['loguser'] = $user;
    }

    public static function CreateAccount($user){
        try {
            $db = DatabaseHandler::GetDatabaseConnection();
        } catch (Exception $exception){
            return "Error connecting to server";
        }

        $sql = "INSERT INTO users (name, pass) VALUES (:name, :password)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name', $user->name, PDO::PARAM_STR);
        $statement->bindValue(':password', static::HashPassword($user->pass), PDO::PARAM_STR);

        if ($statement->execute()){
            $newId = $db->lastInsertId();
            $statement->closeCursor();
            $db = null;
            return 'work';
        } else {
            $statement->closeCursor();
            $db = null;
            return "Username already exists.";
        }
    }

    public static function HashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function Login($user){
        try {
            $db = DatabaseHandler::GetDatabaseConnection();
        } catch (Exception $exception){
            throw new Exception("Error connecting to server");
        }

        $sql = "SELECT * FROM users WHERE name = ':name'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name', $user->name, PDO::PARAM_STR);
        if ($statement->execute()){
            $dbUser = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            if (!isset($dbuser)){
                throw new Exception("No: " . $user->name . ", " . $user->password);
            }

            if (password_verify($user->password, $dbUser['pass'])){
                $user->id = $dbUser['ID'];
                $user->password = '';
                self::setLoggedInUser($user);
            } else {
                throw new Exception("Username or Password are incorrect.");
            }
        }
        else {
            throw new Exception("Error retrieving data from server");
        }
    }
}