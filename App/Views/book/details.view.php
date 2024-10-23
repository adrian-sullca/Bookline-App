<?php if (isset($params['book'])): ?>
    <h1><?php echo htmlspecialchars($params['book']['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($params['book']['coverPhoto']); ?>" alt="<?php echo htmlspecialchars($params['book']['title']); ?>" style="width: 200px;">
    <p><strong>Author:</strong> <?php echo htmlspecialchars($params['book']['autor']); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($params['book']['category']); ?></p>
    <p><strong>Price:</strong> $<?php echo number_format($params['book']['price'], 2); ?></p>
    <p><strong>Synopsis:</strong> <?php echo htmlspecialchars($params['book']['synopsis']); ?></p>
    <a href="/cart/addToCart/<?php echo $params['book']['id']; ?>" class="btn btn-primary">Add to Cart</a>
<?php else: ?>
    <p>Book not found.</p>
<?php endif; ?>
