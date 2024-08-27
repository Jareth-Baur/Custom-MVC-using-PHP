<main>
    <section class="hero">
        <h1>List of Products by category <?php echo $products[2]['productLine']; ?> </h1>
        <a href="#" class="cta">Shop Now</a>
    </section>
    <section class="products">
        <?php foreach($products as $product): ?>
            <article class="product">
                <img src="<?php echo BASE_URL;?>assets/img/products/accessories.jpg" alt="Product 1">
                <h2><?php echo $product['productCode']; ?></h2>
                <p><?php echo $product['productName']; ?></p>
                <p><?php echo $product['productDescription']; ?></p>
                <p>Php <?php echo $product['buyPrice']; ?></p>
                <a href="#" class="cta">Add to cart</a>
            </article>
        <?php endforeach ;?>
    </section>
</main>