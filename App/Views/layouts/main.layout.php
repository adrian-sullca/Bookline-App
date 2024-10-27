<!doctype html>
<html lang="en">

<head>
    <title><?php echo $params['title'] ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../../../Public/Assets/css/styles.css" />
    <style>
        body,
        html {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: black;
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #F47F22 !important;
        }

        .dropdown-item:hover {
            background-color: #F47F22 !important;
            color: white;
        }

        .navbar-nav .nav-link img {
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link img.user-icon:hover {
            content: url('../../../Public/Assets/img/user-icon-orange.svg');
        }

        .navbar-nav .nav-link img.cart-icon:hover {
            content: url('../../../Public/Assets/img/cart-icon-orange.svg');
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #F47F22;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #e0e0e0;
        }

        .btn-floating:hover {
            background-color: #F47F22;
        }

        .btn-floating i {
            color: #e0e0e0;
            transition: color 0.3s ease;
        }

        .btn-floating:hover i {
            color: white;
        }
    </style>
</head>

<body>
    <header style="background-color: black;">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid justify-content-between">
                <div class="d-flex">
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/book/catalog">
                        <img src="../../../Public/Assets/img/logoAd.png" height="20" alt="Logo" loading="lazy" style="margin-top: 2px;" />
                    </a>
                </div>

                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/book/catalog" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">CATALOG</a>
                    </li>
                    <?php
                    if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] == 'admin') {
                    ?>
                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link" href="/admin/bookManagement" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MANAGE BOOKS</a>
                        </li>
                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link" href="/admin/orderManagement" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MANAGE ORDERS</a>
                        </li>
                    <?php
                    }
                    if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] === 'client') {
                    ?>
                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link" href="/order/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MY ORDERS</a>
                        </li>

                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link" href="/order/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">FAVORITES</a>
                        </li>
                    <?php
                    }
                    if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] === 'delivery_person') {
                    ?>
                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link" href="/delivery/orders" style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">ORDERS</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <ul class="navbar-nav flex-row">
                    <?php
                    if (isset($_SESSION['userLogged']) && $_SESSION['userLogged']['rol'] == 'client') {
                    ?>
                        <li class="nav-item me-3 me-lg-1">
                            <a class="nav-link d-sm-flex align-items-sm-center" href="/cart/shoppingCart">
                                <img class="cart-icon" src="../../../Public/Assets/img/cart-icon.svg" height="22" alt="Cart Icon" loading="lazy" />
                            </a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item dropdown me-3 me-lg-1">
                        <ul class="navbar-nav flex-row">
                            <?php if (isset($_SESSION['userLogged'])): ?>
                                <li class="nav-item dropdown me-3 me-lg-1">
                                    <a class="nav-link d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                        <img class="user-icon rounded-circle" src="../../../Public/Assets/img/user-icon.svg" height="22" alt="User Icon" loading="lazy" />
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                        <?php if ($_SESSION['userLogged']['rol'] === 'client'): ?>
                                            <li>
                                                <a class="dropdown-item" href="/user/profile">My profile</a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a class="dropdown-item" href="/user/logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item me-3 me-lg-1">
                                    <a class="nav-link d-flex align-items-center hidden-arrow" href="/auth/login">
                                        <img class="user-icon rounded-circle" src="../../../Public/Assets/img/user-icon.svg" height="22" alt="User Icon" loading="lazy" />
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $params['content'] ?>
    </main>

    <footer class="text-center">
        <div class="container pt-4">
            <section class="mb-4">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-google"></i>
                    </a>
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="color: #e0e0e0;">
            © 2024 Copyright: Adrian Alexander Sullca Aquino
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>