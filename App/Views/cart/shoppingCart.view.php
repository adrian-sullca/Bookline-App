<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3" style="background-color: black;">
                    <h2 style="color: white;">Your <strong style="color: #F47F22">shopping cart</strong></h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $totalCart = 0;
                        if (empty($params['userCartItems'])) {
                            echo '<p style="text-align: center">Your shopping cart is empty</p>';
                        }

                        foreach ($params['userCartItems'] as $item) {

                            if ($item['quantity'] <= 0) {
                                $cartItemModel = new App\Models\CartItem();
                                $cartItemModel->deleteItem($item['id'], $_SESSION['userLogged']);
                                continue;
                            }

                            $bookModel = new App\Models\Book();
                            $book = $bookModel->getBookById($item['bookId']);
                            $quantity = $item['quantity'];
                            $unitPrice = $book['price'];
                            $itemTotal = $quantity * $unitPrice;
                            $totalCart += $itemTotal;
                        ?>
                            <!-- Single item -->
                            <div class="row">
                                <div class="col-lg-2 col-md-12 mb-4 mb-lg-0">
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                        <img src="<?php echo $book['coverPhoto']; ?>" class="w-100" alt="<?php echo $book['title']; ?>" style="max-width: 110px; height: 100%; border-radius: 5px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);" />
                                        <a href="/book/details/<?php echo $book['id'] ?>">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </div>

                                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                    <p><strong><?php echo $book['title']; ?></strong></p>
                                    <p>Category: <?php echo $book['category']; ?></p>
                                    <p>Price: $<?php echo $book['price']; ?></p>
                                    <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-tooltip-init title="Remove item">
                                        <a href="/cartItem/deleteItem/<?php echo $item['id'] ?>" class="text-white">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <form action="/cartItem/deleteAnItem/<?php echo $item['id'] ?>" method="post">
                                            <button type="submit" class="btn px-3 me-2" style="background-color: #F47F22; color: white;">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </form>

                                        <div data-mdb-input-init class="form-outline" style="max-width: 400px;">
                                            <input id="form1" min="0" name="quantity" value="<?php echo $item['quantity']; ?>" class="form-control" style="-moz-appearance: textfield; -webkit-appearance: none; appearance: none; background-color: white;" disabled />
                                            <label class="form-label" for="form1">Quantity</label>
                                        </div>

                                        <form action="/cartItem/addAnItem/<?php echo $item['id'] ?>" method="post">
                                            <button type="submit" class="btn px-3 ms-2" style="background-color: #F47F22; color: white;">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Quantity -->

                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>$<?php echo $itemTotal; ?></strong>
                                    </p>
                                </div>
                            </div>
                            <!-- Single item -->

                            <hr class="my-4" />
                        <?php }
                        ?>
                    </div>
                </div>

                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px" src="../../../Public/Assets//img/visa.svg" alt="Visa" />
                        <img class="me-2" width="45px" src="../../../Public/Assets//img/amex.svg" alt="American Express" />
                        <img class="me-2" width="45px" src="../../../Public/Assets//img/mastercard.svg" alt="Mastercard" />
                        <img class="me-2" width="45px" src="../../../Public/Assets//img/paypal.webp" alt="PayPal acceptance mark" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div style="background-color: black;" class="card-header py-3">
                        <h2 style="color:white" class="mb-0">Summary</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$<?php echo $totalCart; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Free</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including IVA)</p>
                                    </strong>
                                </div>
                                <span><strong>$<?php echo $totalCart; ?></strong></span>
                            </li>
                        </ul>

                        <div style="display: flex; flex-direction:column; gap:15px">
                            <a href="/cart/buy">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #F47F22; color: white;">
                                    Procces order
                                </button>
                            </a>

                            <a href="/cart/clean/<?php echo $_SESSION['userLogged']['cartId']?>">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #F47F22; color: white;">
                                    Clean cart
                                </button>
                            </a>
                            <?php
                            if (isset($params['error'])) {
                                echo '<p style="color:red; margin:0;margin-top:5px; text-align:center;">' . $params['error'] . '</p>';
                            }
                            if (isset($params['message'])) {
                                echo '<p style="color:#F47F22; margin:0;margin-top:5px; text-align:center;">' . $params['message'] . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
</style>