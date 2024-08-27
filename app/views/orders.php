<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .order-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .order-card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .order-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .order-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ddd;
            margin-bottom: 15px;
        }

        .order-card h3 {
            font-size: 18px;
            margin: 0;
        }

        .order-card p {
            margin: 10px 0;
        }

        .order-card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .order-card a:hover {
            color: #0056b3;
        }
    </style>
    <script>
        function searchProduct(event) {
            event.preventDefault();
            const productCode = document.getElementById('productCode').value;
            if (productCode) {
                window.location.href = `<?php echo BASE_URL; ?>order/product/${productCode}`;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Orders</h1>

    <div class="search-bar">
        <form onsubmit="searchProduct(event)">
            <input type="text" id="productCode" placeholder="Enter Product Code" required>
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="order-grid">
        <?php foreach ($data as $order): ?>
            <?php
            $images = [
                'user-307993_960_720.png',
                'user-33638_960_720.png',
                'user-310807_960_720.png'
            ];
            $randomImage = $images[array_rand($images)];
            ?>
            <div class="order-card">
                <img src="<?php echo BASE_URL; ?>assets/img/customers/<?php echo $randomImage; ?>" alt="Customer Image">
                <h3>Order ID: <?php echo htmlspecialchars($order['orderNumber']); ?></h3>
                <p>User: <?php echo htmlspecialchars($order['firstName'] . ' ' . $order['lastName']); ?></p>
                <p>Product: <?php echo htmlspecialchars($order['productName']); ?></p>
                <p>Quantity: <?php echo htmlspecialchars($order['quantityOrdered']); ?></p>
                <p>Price: Php <?php echo number_format($order['priceEach'], 2); ?></p>
                <p>Subtotal: Php <?php echo number_format($order['priceEach'] * $order['quantityOrdered'], 2); ?></p>
                <p>Status: <?php echo htmlspecialchars($order['status']); ?></p>
                <p>Date: <?php echo date('Y-m-d', strtotime($order['orderDate'])); ?></p>
                <a href="<?php echo BASE_URL; ?>order/<?php echo $order['customerNumber']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
