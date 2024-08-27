<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 30px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .customer-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .customer-header img {
            border-radius: 50%;
            margin-right: 25px;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #ddd;
        }

        .customer-header h1 {
            font-size: 26px;
            margin: 0;
        }

        .customer-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        .customer-details th,
        .customer-details td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            vertical-align: top;
        }

        .customer-details th {
            background-color: #f8f8f8;
            font-weight: bold;
            width: 30%;
        }

        .customer-details tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
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
    <div class="customer-header">
        <?php if (is_array($customer) && !empty($customer)): ?>
            <img src="<?php echo BASE_URL; ?>assets/img/customers/user-307993_960_720.png" alt="Customer Image">
            <h1>Customer: <?php echo htmlspecialchars($customer['customerName']); ?></h1>
        <?php endif; ?>
    </div>

    <table class="customer-details">
        <tr>
            <th>Customer Number</th>
            <td><?php echo htmlspecialchars($customer['customerNumber']); ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo htmlspecialchars($customer['customerName']); ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo htmlspecialchars($customer['addressLine1']); ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo htmlspecialchars($customer['city']); ?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?php echo htmlspecialchars($customer['country']); ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo htmlspecialchars($customer['phone']); ?></td>
        </tr>
        <!-- Add more customer details as needed -->
    </table>

    <?php if (!is_array($customer) || empty($customer)): ?>
        <p>No customer details available.</p>
    <?php endif; ?>

    <a href="<?php echo BASE_URL; ?>customers" class="back-link">Back to Customers</a>
</div>
</body>
</html>
