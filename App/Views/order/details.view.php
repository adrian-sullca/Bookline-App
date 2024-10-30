<div class="container-fluid">
    <div class="container">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0">Order #<?php echo htmlspecialchars($params['order']['id']); ?></h2>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3">22-11-2021</span>
                                <span class="me-3">#<?php echo htmlspecialchars($params['order']['id']); ?></span>
                                <span class="me-3">Visa -1234</span>
                                <?php
                                // Assign color classes based on order state
                                $state = $params['order']['state'];
                                $colorClass = '';

                                switch ($state) {
                                    case 'Canceled':
                                        $colorClass = 'bg-danger'; // Rojo
                                        break;
                                    case 'Pending':
                                        $colorClass = 'bg-warning'; // Amarillo
                                        break;
                                    case 'Validated':
                                        $colorClass = 'bg-info'; // Azul Claro
                                        break;
                                    case 'In Transit':
                                        $colorClass = 'bg-secondary'; // Naranja (opcional)
                                        break;
                                    case 'Delivered to the Customer':
                                        $colorClass = 'bg-success'; // Verde
                                        break;
                                    case 'Confirmed by Customer':
                                        $colorClass = 'bg-primary'; // Azul Oscuro
                                        break;
                                }
                                ?>
                                <span class="badge rounded-pill <?php echo $colorClass; ?>">
                                    <?php echo htmlspecialchars($state); ?>
                                </span>
                                <?php
                                if (isset($params['message'])) {
                                    echo "<p style='color:#F47F22'>" . $params['message'] . "</p>";
                                }
                                ?>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text">
                                    <i class="bi bi-download"></i> <span class="text">Invoice</span>
                                </button>
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <?php

                                use App\Models\Book;
                                use App\Models\User;

                                $bookModel = new Book();
                                $orderTotal = 0;

                                foreach ($params['orderLinesByOrder'] as $line) {
                                    $bookDetails = $bookModel->getBookById($line['itemId']);
                                    if ($bookDetails) {
                                        $totalLine = $line['price'] * $line['quantity'];
                                        $orderTotal += $totalLine;
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="<?php echo htmlspecialchars($bookDetails['coverPhoto']); ?>" alt="" width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="#" class="text-reset"><?php echo htmlspecialchars($bookDetails['title']); ?></a></h6>
                                                        <span class="small">Color: Black</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($line['quantity']); ?></td>
                                            <td class="text-end">$<?php echo number_format($totalLine, 2); ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td class="text-end">$<?php echo number_format($orderTotal, 2); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Shipping</td>
                                    <td class="text-end">$00.00</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">$<?php echo number_format($orderTotal, 2); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Payment -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Payment Method</h3>
                                <p>Visa -1234 <br>
                                    Total: $<?php echo number_format($orderTotal, 2); ?> <span class="badge bg-success rounded-pill">PAID</span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Shipping address</h3>
                                <address>
                                    <?php
                                    $userModel = new User();
                                    $user = $userModel->getById($params['order']['userId'])
                                    ?>
                                    <strong><?php echo htmlspecialchars($user['username']); ?></strong><br>
                                    <?php echo htmlspecialchars($user['address']); ?><br>
                                    <?php echo htmlspecialchars($user['phoneNumber']); ?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <!-- Shipping information -->
                    <div class="card-body">
                        <h3 class="h6">Shipping Information</h3>
                        <strong>FedEx</strong>
                        <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i></span>
                        <hr>
                        <h3 class="h6">Address</h3>
                        <address>
                            <strong><?php echo htmlspecialchars($user['username']); ?></strong><br>
                            <?php echo htmlspecialchars($user['address']); ?><br>
                            <?php echo htmlspecialchars($user['phoneNumber']); ?>
                        </address>
                    </div>
                </div>

                <?php if ($params['order']['state'] === 'Pending' || $params['order']['state'] === 'Validated' ): ?>
                    <div class="card mb-3">
                        <a href="/order/cancel/<?php echo htmlspecialchars($params['order']['id']); ?>">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #F47F22; color: white;">
                                Cancel order
                            </button>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION['userLogged']['rol'] === 'admin' && $params['order']['state'] == 'Pending'): ?>
                    <div class="card">
                        <a href="/order/validate/<?php echo htmlspecialchars($params['order']['id']); ?>">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" style="background-color: #F47F22; color: white;">
                                Validate order
                            </button>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>