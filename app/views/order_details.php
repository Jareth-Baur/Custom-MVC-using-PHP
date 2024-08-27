<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 40px auto;
            max-width: 900px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-details {
            margin-top: 30px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: left;
            vertical-align: middle;
        }

        .order-details th {
            background-color: #e9ecef;
            font-weight: 600;
        }

        .order-details tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .order-details h1 {
            font-size: 26px;
            margin-bottom: 25px;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .order-details p {
            margin: 12px 0;
            font-size: 18px;
            color: #495057;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #0056b3;
            color: #000000;
        }

        .back-link:active {
            background-color: #003d82;
        }

        table th,
        table td {
            font-size: 16px;
        }

        table tr:first-child th,
        table tr:first-child td {
            border-top: none;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Order Details</h1>

    <?php if (is_array($order) && !empty($order)): ?>
    <div class="order-details">
        <p><strong>Order
                ID:</strong> <?php echo isset($order['orderNumber']) ? htmlspecialchars($order['orderNumber']) : 'N/A'; ?>
        </p>
        <p>
            <strong>User:</strong> <?php echo isset($order['customerName']) ? htmlspecialchars($order['customerName']) : 'N/A'; ?>
        </p>
        <p>
            <strong>Product:</strong> <?php echo isset($order['productName']) ? htmlspecialchars($order['productName']) : 'N/A'; ?>
        </p>
        <p>
            <strong>Quantity:</strong> <?php echo isset($order['quantityOrdered']) ? htmlspecialchars($order['quantityOrdered']) : 'N/A'; ?>
        </p>
        <p><strong>Price Each:</strong>
            Php <?php echo isset($order['priceEach']) ? number_format($order['priceEach'], 2) : '0.00'; ?></p>
        <p><strong>Subtotal:</strong>
            Php <?php echo isset($order['priceEach']) && isset($order['quantityOrdered']) ? number_format($order['priceEach'] * $order['quantityOrdered'], 2) : '0.00'; ?>
        </p>
        <p><strong>Status:</strong> <?php echo isset($order['status']) ? htmlspecialchars($order['status']) : 'N/A'; ?>
        </p>
        <p><strong>Order
                Date:</strong> <?php echo isset($order['orderDate']) ? date('Y-m-d', strtotime($order['orderDate'])) : '1970-01-01'; ?>
        </p>

        <h3>Customer Details:</h3>
        <table>
            <tr>
                <th>Customer Number</th>
                <td><?php echo isset($order['customerNumber']) ? htmlspecialchars($order['customerNumber']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo isset($order['customerName']) ? htmlspecialchars($order['customerName']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo isset($order['address']) ? htmlspecialchars($order['address']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo isset($order['city']) ? htmlspecialchars($order['city']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo isset($order['country']) ? htmlspecialchars($order['country']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo isset($order['phone']) ? htmlspecialchars($order['phone']) : 'N/A'; ?></td>
            </tr>
        </table>
        <?php else: ?>
            <p>No details available for this order.</p>
        <?php endif; ?>

        <a href="<?php echo BASE_URL; ?>orders" class="back-link">Back to Orders</a>
    </div>
</div>

</body>

</html>
