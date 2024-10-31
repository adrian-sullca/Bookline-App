<!doctype html>
<html lang="en">

<head>
    <title><?php echo $params['title'] ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
    <?php include('header.php') ?>
    <main>
        <?php echo $params['content'] ?>
    </main>
    <?php include('footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>