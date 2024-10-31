<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<br>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2>All <strong style="color: #F47F22">orders</strong></h2>
                </div>
            </div>
        </div>
        <div class="table-filter">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                    <button type="button" class="btn btn-primary" style="background-color: #F47F22; color: white;"><i class="fa fa-search"></i></button>
                    <div class="filter-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option>Any</option>
                            <option>Delivered</option>
                            <option>Shipped</option>
                            <option>Pending</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use App\Models\User;

                $userModel = new User;
                foreach ($params['allOrdersFilter'] as $order) {
                    switch ($order['state']) {
                        case 'Canceled':
                            $colorClass = 'text-danger';
                            break;
                        case 'Pending':
                            $colorClass = 'text-warning';
                            break;
                        case 'Validated':
                            $colorClass = 'text-info';
                            break;
                        case 'In Transit':
                            $colorClass = 'text-secondary';
                            break;
                        case 'Delivered to the Customer':
                            $colorClass = 'text-success';
                            break;
                        case 'Confirmed by Customer':
                            $colorClass = 'text-primary';
                            break;
                    }
                ?>
                    <tr>
                        <?php $user = $userModel->getById($order['userId']) ?>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['address'] ?></td>
                        <td><?php echo $order['orderDate'] ?></td>
                        <td><span class="status <?php echo $colorClass; ?>">&bull;</span> <?php echo htmlspecialchars($order['state']); ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button data-toggle="modal" data-target="#modalOrder<?php echo $order['id']; ?>" style="border: none; background: none;">
                                <img src="../../../Public/Assets/img/info-icon-orange.svg" alt="">
                            </button>

                            <div class="modal fade" id="modalOrder<?php echo $order['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row d-flex justify-content-between px-3 top">
                                                <div class="d-flex" style="margin-left: 32px; margin-top:25px">
                                                    <h5>ORDER <span class="text-dark font-weight-bold">#<?php echo ($order['id']); ?></span></h5>
                                                </div>
                                                <div class="d-flex flex-column text-sm-right" style="margin-left: 32px">
                                                    <p>Client: <span class="font-weight-bold"><?php echo ($user['username']) ?></span>
                                                        <br>
                                                        Address: <span class="font-weight-bold"><?php echo ($user['address']) ?></span>
                                                        <br>
                                                        Phone number: <span class="font-weight-bold"><?php echo ($user['phoneNumber']) ?></span>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Timeline -->
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-12">
                                                    <ul id="progressbar" class="text-center">
                                                        <li class="step0 active">
                                                            <div class="icon-content">
                                                                <div class="icon"><i class="bi bi-file-earmark-check"></i></div>
                                                                <p>Order validated</p>
                                                            </div>
                                                        </li>
                                                        <?php
                                                        if ($order['state'] == 'In Transit' || $order['state'] == 'Delivered to the Customer') {
                                                        ?>
                                                            <li class="step0 active">
                                                                <div class="icon-content">
                                                                    <div class="icon"><i class="bi bi-truck"></i></div>
                                                                    <p>In transit</p>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="step0">
                                                                <div class="icon-content">
                                                                    <div class="icon"><i class="bi bi-truck"></i></div>
                                                                    <p>In transit</p>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        }

                                                        if ($order['state'] == 'Delivered to the Customer') {
                                                        ?>
                                                            <li class="step0 active">
                                                                <div class="icon-content">
                                                                    <div class="icon"><i class="bi bi-house"></i></div>
                                                                    <p>Order delivered</p>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="step0">
                                                                <div class="icon-content">
                                                                    <div class="icon"><i class="bi bi-house"></i></div>
                                                                    <p>Order delivered</p>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        }
                                                        ?>
                                                        <li class="step0">
                                                            <div class="icon-content">
                                                                <div class="icon"><i class="bi bi-check-circle"></i></div>
                                                                <p>Order confirmed</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // Verifica si el estado es 'Validated' o 'In Transit' para mostrar el botón
                                        if ($order['state'] == 'Validated' || $order['state'] == 'In Transit') {

                                        ?>
                                            <div class="modal-footer">
                                                <form action="/delivery/updateOrderState/<?php echo $order['id'] ?>" method="post" style="margin: 0; flex-grow: 1; display: flex; justify-content: flex-end;">
                                                    <?php
                                                    $value = '';
                                                    $textButton = '';
                                                    if ($order['state'] == 'Validated') {
                                                        $value = 'start_delivery';
                                                        $textButton = 'Start delivery';
                                                    }
                                                    if ($order['state'] == 'In Transit') {
                                                        $value = 'order_delivered';
                                                        $textButton = 'Order delivered';
                                                    }

                                                    // Solo mostrar el botón si se ha definido correctamente
                                                    if (!empty($value) && !empty($textButton)) {
                                                    ?>
                                                        <button class="custom-button" type="submit" name="action" value="<?php echo $value ?>" style="white-space: nowrap; margin-right:55px"><?php echo $textButton ?></button>
                                                    <?php
                                                    }
                                                    ?>
                                                </form>
                                            <?php
                                        }
                                            ?>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


<style>
    .card {
        /* Establece un ancho máximo para la tarjeta */
        margin: 0 auto;
        /* Centra la tarjeta horizontalmente */
        padding-top: 50px;
        padding-bottom: 50px;
        /* Añade un espaciado interno */
    }

    .row.d-flex.justify-content-center {
        margin-top: 20px;
        /* Aumenta el espaciado entre el contenido superior y la línea de progreso */
    }

    .custom-button {
        width: 100%;
        /* Hace que los botones ocupen todo el ancho de la tarjeta */
        margin: 10px 0;
        /* Aumenta el margen vertical entre los botones */
    }

    /* El resto del CSS sigue igual... */

    .custom-button {
        background-color: #ff8c00;
        /* Color de fondo naranja */
        color: white;
        /* Color del texto */
        border: none;
        /* Sin borde */
        border-radius: 5px;
        /* Bordes redondeados */
        padding: 10px 20px;
        /* Espaciado interno */
        font-size: 1rem;
        /* Tamaño de fuente */
        cursor: pointer;
        /* Cambiar el cursor a puntero */
        transition: background-color 0.3s ease;
        /* Transición suave para el hover */
        margin: 5px;
        /* Espaciado entre botones */
        width: 85%;
    }

    .custom-button:hover {
        background-color: #e07b00;
        /* Color de fondo al pasar el mouse */
    }

    /* Timeline and progress bar styling */
    #progressbar {
        position: relative;
        list-style-type: none;
        padding: 0;
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    /* Background line */
    #progressbar::before {
        content: '';
        position: absolute;
        top: 25px;
        /* Aligns with icons */
        left: 13%;
        /* Starts the line just after the first icon */
        right: 13%;
        /* Ends the line just before the last icon */
        height: 4px;
        background-color: #dcdcdc;
        /* Default background color */
        z-index: 1;
    }

    /* Progress line for active steps */
    #progressbar li.active~li:before {
        background-color: #dcdcdc;
        /* Background color for inactive steps */
    }

    /* Step items */
    #progressbar li {
        position: relative;
        flex: 1;
        text-align: center;
        z-index: 2;
        /* Ensures icons are above the line */
    }

    /* Completed steps */
    #progressbar li.active .icon {
        background-color: #ff8c00;
        /* Orange for completed steps */
    }

    /* Active line between completed steps */
    #progressbar li.active:before {
        content: '';
        position: absolute;
        top: 25px;
        /* Full width until the next step */
        height: 4px;
        background-color: #ff8c00;
        /* Orange for completed steps */
        z-index: -1;
        /* Behind the icons */
        transform: translateX(-50%);
        /* Center the line */
    }

    .progress-container.Validated #progressbar li.active:before {
        left: 80%;
        width: 80px;
        content: '';
        position: absolute;
        top: 25px;
        /* Full width until the next step */
        height: 4px;
        background-color: #ff8c00;
        /* Orange for completed steps */
        z-index: -1;
    }

    .progress-container.Validated #progressbar li.active:before {
        left: 80%;
        width: 80px;
    }

    /* Step icon content */
    .icon-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
    }

    /* Circle icons */
    .icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #dcdcdc;
        /* Default gray background */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #fff;
        margin-bottom: 10px;
        z-index: 3;
    }

    /* Completed icons */
    #progressbar li.active .icon {
        background-color: #ff8c00;
        /* Orange for completed steps */
    }

    .icon-content p {
        margin: 0;
        font-weight: bold;
        font-size: 0.8rem;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
        border-radius: 9px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }

    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }

    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }

    .table-title .btn {
        font-size: 13px;
        border: none;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    .table-title {
        color: #fff;
        background: black;
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 9px 9px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .show-entries select.form-control {
        width: 60px;
        margin: 0 5px;
    }

    .table-filter .filter-group {
        float: right;
        margin-left: 15px;
    }

    .table-filter input,
    .table-filter select {
        height: 34px;
        border-radius: 3px;
        border-color: #ddd;
        box-shadow: none;
    }

    .table-filter {
        padding: 5px 0 15px;
        border-bottom: 1px solid #e9e9e9;
        margin-bottom: 5px;
    }

    .table-filter .btn {
        height: 34px;
    }

    .table-filter label {
        font-weight: normal;
        margin-left: 10px;
    }

    .table-filter select,
    .table-filter input {
        display: inline-block;
        margin-left: 5px;
    }

    .table-filter input {
        width: 200px;
        display: inline-block;
    }

    .filter-group select.form-control {
        width: 110px;
    }

    .filter-icon {
        float: right;
        margin-top: 7px;
    }

    .filter-icon i {
        font-size: 18px;
        opacity: 0.7;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 80px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.view {
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }

    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }

    .text-success {
        color: #10c469;
    }

    .text-info {
        color: #62c9e8;
    }

    .text-warning {
        color: #FFC107;
    }

    .text-danger {
        color: #ff5b5b;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>