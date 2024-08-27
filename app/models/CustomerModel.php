<?php

require_once 'core/Database.php';
class CustomerModel
{
    public static function list()
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch customer data by ID
        $stmt = $db->prepare("SELECT * FROM customers");
        $stmt->execute();

        // Fetch and return the customer data
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function customerById($id)
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch customer data by ID
        $stmt = $db->prepare("SELECT * FROM customers WHERE customerNumber = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the customer data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
