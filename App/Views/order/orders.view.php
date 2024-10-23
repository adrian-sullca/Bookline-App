<h1>Orders User: <?php echo $params['userLogged']['username'] ?></h1>

<?php
foreach ($params['userOrders'] as $order) { ?>
    <a href="/order/details/<?php echo $order['id'] ?>">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Order id: <?php echo $order['id'] ?></h5>
                <p class="card-text">State: <?php echo $order['state'] ?></p>
                <p class="card-text">User id: <?php echo $order['userId'] ?></p>
            </div>
        </div>
    </a>
    <br>
<? } ?>