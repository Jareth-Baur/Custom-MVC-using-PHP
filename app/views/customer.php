<?php
// Step 1: Define an array with the image filenames
$images = [
    'user-307993_960_720.png',
    'user-310807_960_720.png',
    'user-33638_960_720.png'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customers</title>
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

        .customer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .customer-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
            text-align: center;
        }

        .customer-card img {
            border-radius: 50%;
            margin-bottom: 15px;
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .customer-card h2 {
            font-size: 18px;
            margin: 10px 0;
            flex-grow: 1;
        }

        .customer-card p {
            margin: 5px 0;
        }

        .customer-card a {
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .customer-card a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>All Customers</h1>

    <?php if (is_array($customers) && !empty($customers)): ?>
        <div class="customer-grid">
            <?php foreach ($customers as $customer): ?>
                <?php
                // Step 2: Randomly select an image for each customer
                $randomImage = $images[array_rand($images)];
                ?>
                <div class="customer-card">
                    <img src="<?php echo BASE_URL; ?>assets/img/customers/<?php echo $randomImage; ?>"
                         alt="Customer Image">
                    <h2><?php echo htmlspecialchars($customer['customerName']); ?></h2>
                    <p>Customer Number: <?php echo htmlspecialchars($customer['customerNumber']); ?></p>
                    <p>City: <?php echo htmlspecialchars($customer['city']); ?></p>
                    <p>Country: <?php echo htmlspecialchars($customer['country']); ?></p>
                    <a href="<?php echo BASE_URL; ?>customer/<?php echo $customer['customerNumber']; ?>">View
                        Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No customers available.</p>
    <?php endif; ?>
</div>
</body>
</html>
