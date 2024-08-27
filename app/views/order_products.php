<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            max-width: 1000px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #0056b3;
            color: #000000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Orders for Product Code: <?php echo htmlspecialchars($productCode); ?></h1>

    <?php if (!empty($orderProducts)): ?>
        <table>
            <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Quantity Ordered</th>
                <th>Price Each</th>
                <th>Total Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orderProducts as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['orderNumber']); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($order['orderDate'])); ?></td>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                    <td><?php echo htmlspecialchars($order['quantityOrdered']); ?></td>
                    <td>Php <?php echo number_format($order['priceEach'], 2); ?></td>
                    <td>Php <?php echo number_format($order['priceEach'] * $order['quantityOrdered'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders found for this product.</p>
    <?php endif; ?>

    <a href="<?php echo BASE_URL; ?>orders" class="back-link">Back to Orders</a>
</div>
</body>
</html>
