<main>
    <section class="hero">
        <h1>Details of Product <?php echo htmlspecialchars($product['productName']); ?></h1>
    </section>
    <section class="products">
        <article class="product">
            <img src="<?php echo BASE_URL; ?>assets/img/products/accessories.jpg" alt="Product 1">
            <p><?php echo htmlspecialchars($product['productDescription']); ?></p>
            <p>Php <?php echo htmlspecialchars($product['buyPrice']); ?></p>
            <a href="#" class="cta">Add to cart</a>
            <a href="<?php echo BASE_URL . "shop"; ?>" class="cta">Back To Products</a>
        </article>
    </section>
</main>
