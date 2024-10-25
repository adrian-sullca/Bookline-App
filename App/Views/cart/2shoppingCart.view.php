<?php
$user = $params['userLogged'];
if (isset($params['message'])) {
    echo '<p>' . $params['message'] . '</p>';
    unset($params['message']);
}
echo '<h1>Carrito de' . $user['username'] . '</h1>';
$totalCart = 0;

use App\Models\Book;

foreach ($params['userCartItems'] as $item) {
    $bookModel = new Book();
    $book = $bookModel->getBookById($item['bookId']);
    $quantity = $item['quantity'];
    $unitPrice = $book['price'];
    echo '<p>Book Id: ' . $item['bookId'] . ' cantidad: ' . $item['quantity'] . '</p>';
    $itemTotal = $quantity * $unitPrice;
    $totalCart += $itemTotal;

?>
    <button>
        <a href="/cartItem/deleteAnItem/<?php echo $item['id'] ?>">-</a>
    </button>

    <button>
        <a href="/cartItem/addAnItem/<?php echo $item['id'] ?>">+</a>
    </button>

    <button>
        <a href="/cartItem/deleteItem/<?php echo $item['id'] ?>">Delete item</a>
    </button>
<?php
    echo '<br>';
}


echo '<br>';
echo '<br>';
echo '<br>';
echo '<p>Total Carrito: ' . $totalCart . '</p>';
?>
<button>
    <a href="/cart/buy" class="btn btn-primary">Buy</a>
</button>

<br>
<br>
<br>

<button>
    <a href="/cart/clean/<?php echo $user['cartId'] ?>" class="btn btn-primary">Clean</a>
</button>

<pre>
    <?php print_r($_SESSION['cartItems'])?>
</pre>