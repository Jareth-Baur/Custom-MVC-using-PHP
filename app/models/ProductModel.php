<?php
require_once 'core/Database.php';

class ProductModel
{

    public static function list()
    {
        // Connect to the database
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM products /*LIMIT 10*/;');
        $stmt->execute();

        // Fetch and return the product data
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public static function productById($id)
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch product data by ID
        $stmt = $db->prepare("SELECT * FROM products WHERE productCode = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the product data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function productByProductline($productLine)
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch products by product line
        $stmt = $db->prepare("SELECT * FROM products WHERE productLine = :productLine");
        $stmt->bindParam(':productLine', $productLine, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch and return the products data
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}