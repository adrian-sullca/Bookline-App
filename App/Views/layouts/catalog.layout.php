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

        /* Estilo por defecto para las imágenes del header */
        .navbar-nav .nav-link img {
            transition: all 0.3s ease;
            /* Transición suave */
        }

        /* Cambia la imagen en hover */
        .navbar-nav .nav-link img.user-icon:hover {
            content: url('../../../Public/Assets/img/user-icon-orange.svg');
        }

        .navbar-nav .nav-link img.cart-icon:hover {
            content: url('../../../Public/Assets/img/cart-icon-orange.svg');
        }

        /* Personalización del scrollbar */
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

        .list-group-item-action {
            color: black;
            transition: background-color 0.3s ease;
        }

        .selected {
            background-color: #F47F22 !important;
            color: white !important;
        }

        body {
            display: flex;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .main-content {
            display: flex;
            flex-grow: 1;
            padding: 20px;
        }

        .sidebar {
            width: 20%;
            background-color: white;
            padding: 20px;
            margin-right: 20px;
        }

        .empty-container {
            display: flex;
            flex-direction: column;
            width: 80%;
            /* Ocupa el 80% del contenedor principal */
            margin: 0 auto;
            /* Centrar el contenedor */
            text-align: center;
            flex-grow: 1;
        }

        .input-group {
            margin-bottom: 20px;
            /* Espacio entre la barra de búsqueda y las tarjetas */
            width: 100%;
            /* Asegura que la barra de búsqueda ocupe todo el ancho */
        }

        .product-grid {
            display: flex;
            /* Usar flex para la cuadrícula de productos */
            flex-wrap: wrap;
            /* Permitir que las tarjetas se ajusten a múltiples filas */
            justify-content: flex-start;
            /* Alinear tarjetas al inicio */
            gap: 18px;
        }

        .card {
            max-width: 180px;
            /* Ancho fijo para cada tarjeta */
            margin-bottom: 20px;
            /* Espaciado entre tarjetas verticalmente */
        }

        .card-body {
            padding: 20px;
            /* Espaciado interno de la tarjeta */
        }

        .btn-custom {
            background-color: #F47F22;
            /* Color de fondo del botón */
            color: white;
            /* Color del texto */
            border: none;
            /* Sin borde */
            border-radius: 3px;
            /* Esquinas redondeadas */
        }

        .btn-custom:hover {
            background-color: #d4711e;
            /* Color de fondo al pasar el ratón */
            color: white;
            /* Color del texto al pasar el ratón */
        }
    </style>
</head>

<body>
    <header style="background-color: black;">
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                    <!-- Brand -->
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/book/catalog">
                        <img src="../../../Public/Assets/img/logoAd.png" height="20" alt="MDB Logo" loading="lazy"
                            style="margin-top: 2px;" />
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/book/catalog"
                            style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">CATALOG</a>
                    </li>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/order/orders"
                            style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">MY
                            ORDERS</a>
                    </li>

                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="/order/orders"
                            style="color: white; font-family: 'Open Sans', sans-serif; font-weight: 800; font-size: 13px; text-align: center;">
                            FAVORITES</a>
                    </li>
                </ul>
                <!-- Center elements -->

                <!-- Right elements -->
                <ul class="navbar-nav flex-row">
                    <!-- Carrito -->
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link d-sm-flex align-items-sm-center" href="/cart/shoppingCart">
                            <img class="cart-icon" src="../../../Public/Assets/img/cart-icon.svg" height="22"
                                alt="Cart Icon" loading="lazy" />
                        </a>
                    </li>

                    <!-- Perfil Dropdown -->
                    <li class="nav-item dropdown me-3 me-lg-1">
                        <!-- Dropdown menu -->
                        <ul class="navbar-nav flex-row">
                            <?php if (isset($_SESSION['userLogged'])): ?>
                                <li class="nav-item dropdown me-3 me-lg-1">
                                    <a class="nav-link d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                        <img class="user-icon rounded-circle" src="../../../Public/Assets/img/user-icon.svg" height="22" alt="User Icon" loading="lazy" />
                                    </a>
                                    <!-- Dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                        <li>
                                            <a class="dropdown-item" href="/user/profile">My profile</a>
                                        </li>
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
        <br>
        <br>
        <div style="width: 90%; margin: 0 auto;">
            <div class="main-content">
                <!-- Sidebar lateral -->
                <div class="sidebar p-3">
                    <p>filter search</p>
                    <form method="GET" action="/book/catalog">
                        <ul class="list-group">
                            <?php foreach ($_SESSION['categories'] as $category): ?>
                                <li class="list-group-item">
                                    <input type="checkbox" name="category[]" value="<?php echo $category; ?>"
                                        <?php echo in_array($category, $params['selectedCategories']) ? 'checked' : ''; ?>><?php echo $category; ?>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                        <button type="submit" class="btn btn-custom mt-3" style="width: 100%;">Aplicar Filtros</button>
                    </form>
                </div>

                <!-- Contenedor para productos -->
                <div class="empty-container" style="width: 80%; margin: 0 auto;">
                    <!-- Barra de búsqueda -->
                    <form method="GET" action="/book/catalog" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Buscar productos..."
                                value="<?php echo htmlspecialchars($params['query'] ? $params['query'] : "") ?>" aria-label="Buscar productos">
                            <div class="input-group-append">
                                <button class="btn btn-custom" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <!-- Tarjetas de productos -->
                    <div class="product-grid">
                        <?php echo $params['content'] ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </main>

    <footer class="text-center">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <div class="d-flex justify-content-center">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-google"></i>
                    </a>
                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="color: #e0e0e0;">
            © 2024 Copyright: Adrian Alexander Sullca Aquino
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>