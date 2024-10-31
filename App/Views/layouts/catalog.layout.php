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
            width: 99.5%;
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

        .list-group-item {
            cursor: pointer; /* Cambia el cursor al pasar por encima para indicar que es clicable */
            display: flex; /* Utiliza flex para alinear checkbox y texto */
            align-items: center; /* Centra verticalmente el contenido */
        }

        .list-group-item input[type="checkbox"] {
            margin-right: 10px; /* Espacio entre el checkbox y el texto */
        }
    </style>
</head>

<body>
    <?php include('header.php') ?>
    <main>
        <br>
        <br>
        <div style="width: 84%; margin: 0 auto;">
            <div class="main-content">
                <!-- Sidebar lateral -->
                <div class="sidebar p-3">
                    <p style="text-align: center;">filter search</p>
                    <form method="GET" action="/book/catalog">
                        <ul class="list-group">
                            <?php foreach ($_SESSION['categories'] as $category): ?>
                                <li class="list-group-item" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="category[]" value="<?php echo $category; ?>"
                                        <?php echo in_array($category, $params['selectedCategories']) ? 'checked' : ''; ?>>
                                    <?php echo $category; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="submit" class="btn btn-custom mt-3" style="width: 100%;">Apply filters</button>
                    </form>
                </div>

                <!-- Contenedor para productos -->
                <div class="empty-container" style="width: 80%; margin: 0 auto;">
                    <!-- Barra de búsqueda -->
                    <form method="GET" action="/book/catalog" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search for books..."
                                value="<?php echo htmlspecialchars($params['query'] ? $params['query'] : "") ?>" aria-label="Buscar productos">
                            <div class="input-group-append">
                                <button class="btn btn-custom" type="submit">Search</button>
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
    <?php include('footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <script>
        function toggleCheckbox(listItem) {
            const checkbox = listItem.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
        }
    </script>
</body>

</html>