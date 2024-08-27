<?php
// app/models/UserModel.php
require_once 'core/Database.php';
class UserModel
{
    public static function getUserById($userId)
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch user data by ID
        $stmt = $db->prepare("SELECT * FROM users WHERE id = $userId");
       // $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the user data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function userList() {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch user data by ID
        $stmt = $db->prepare('SELECT * FROM users LIMIT 10');
        $stmt->execute();

        // Fetch and return the user data
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

}

?>