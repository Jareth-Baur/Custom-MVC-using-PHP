<?php
require_once 'core/Database.php';

class OrderModel
{

    public static function list()
    {
        // Connect to the database
        $db = Database::connect();

        // Execute a query to fetch order details along with customer and product information
        $stmt = $db->prepare("
        SELECT 
            orders.orderNumber,
            orders.orderDate,
            orders.status,
            customers.customerNumber,
            customers.contactFirstName AS firstName,
            customers.contactLastName AS lastName,
            products.productName,
            orderdetails.quantityOrdered,
            orderdetails.priceEach
        FROM orders
        INNER JOIN customers ON orders.customerNumber = customers.customerNumber
        INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
        INNER JOIN products ON orderdetails.productCode = products.productCode
        LIMIT 25
    ");
        $stmt->execute();

        // Fetch and return the combined order data
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function ordersByCustomer($customerId)
    {
        // Connect to the database
        $db = Database::connect();

        // Prepare the SQL query with correct column names and aliases
        $query = "
        SELECT 
            o.orderNumber, 
            o.orderDate, 
            o.status, 
            od.quantityOrdered, 
            od.priceEach,
            (od.quantityOrdered * od.priceEach) AS subtotal,
            p.productName,
            c.customerNumber,
            c.customerName,
            c.addressLine1 AS address,
            c.city,
            c.country,
            c.phone
        FROM orders o
        JOIN orderdetails od ON o.orderNumber = od.orderNumber
        JOIN products p ON od.productCode = p.productCode
        JOIN customers c ON o.customerNumber = c.customerNumber
        WHERE o.customerNumber = :customerId
        ORDER BY o.orderDate DESC
    ";

        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the orders data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function orderProducts($productId)
    {
        // Connect to the database
        $db = Database::connect();

        // SQL query to fetch orders that include a specific product
        $sql = "
        SELECT 
            orders.orderNumber, 
            orders.orderDate, 
            orders.status,
            customers.customerName,
            orderdetails.quantityOrdered,
            orderdetails.priceEach,
            (orderdetails.quantityOrdered * orderdetails.priceEach) AS totalPrice
        FROM orderdetails
        INNER JOIN orders ON orderdetails.orderNumber = orders.orderNumber
        INNER JOIN customers ON orders.customerNumber = customers.customerNumber
        WHERE orderdetails.productCode = :productId
    ";

        // Prepare and execute the query
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch and return the order data
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}