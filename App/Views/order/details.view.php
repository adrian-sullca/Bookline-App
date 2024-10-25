<?php
use App\Models\Book;

$bookModel = new Book();
if (isset($params['message'])) {
    echo '<p>' . $params['message'] . '</p>';
}
if (isset($params['order'])): ?>
    <h1>Order Id: <?php echo htmlspecialchars($params['order']['id']); ?></h1>
    <p><strong>State:</strong> <?php echo htmlspecialchars($params['order']['state']); ?></p>
    <p><strong>User Id:</strong> <?php echo htmlspecialchars($params['order']['userId']); ?></p>
    <p>Order Lines: </p>

    <?php
    // Inicializa el total de la orden
    $orderTotal = 0;

    foreach ($params['orderLinesByOrder'] as $line) {
        echo '<p>-------------------</p>';
        echo '<p>Id Book: ' . htmlspecialchars($line['itemId']) . '</p>';
        echo '<p>Name Book: ' . htmlspecialchars($bookModel->getBookById($line['itemId'])['title']) . '</p>';
        echo '<p>Price Book: ' . htmlspecialchars($line['price']) . '</p>';
        echo '<p>Quantity: ' . htmlspecialchars($line['quantity']) . '</p>';

        // Calcula el total de la linea
        $totalLine = $line['price'] * $line['quantity'];
        echo '<p>Total Line: ' . htmlspecialchars($totalLine) . '</p>';

        // Suma el total de la línea al total de la orden
        $orderTotal += $totalLine;
    }

    // Muestra el total acumulado de la orden
    echo '<p><strong>Total Order: ' . htmlspecialchars($orderTotal) . '</strong></p>';

    // Si el estado de la orden es 'pending', muestra el botón para cancelar la order
    if ($params['order']['state'] == 'pending') {
        ?>
        <a href="/order/cancel/<?php echo htmlspecialchars($params['order']['id']); ?>" class="btn btn-primary">Cancel Order</a>
    <?php
    }
    ?>
<?php else: ?>
    <p>Order not found.</p>
<?php endif; ?>
