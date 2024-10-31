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

        .card-header {
            background-color: black;
            color: white;
        }

        .list-group-item-action {
            color: black;
            font-weight: 600;
            background-color: white;
            transition: background-color 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .card-body {
            background-color: white;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include('header.php') ?>
    <main>
        <div class="container p-0">
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-5 col-xl-4">

                    <div class="card">
                        <div class="card-header py-3" style="background-color: black; height:62px">
                            <h2 style="color: white; font-size:1.5rem">Profile <strong style="color: #F47F22">settings</strong></h2>
                        </div>

                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action d-flex align-items-center" style="height: 50px; padding-left:32px" href="/user/profile">
                                My profile
                            </a>
                            <a class="list-group-item list-group-item-action d-flex align-items-center" style="height: 50px; padding-left:32px" href="/user/accountSettings">Account</a>
                            <a class="list-group-item list-group-item-action d-flex align-items-center" style="height: 50px; padding-left:32px" href="/user/addressSettings">Address</a>
                            <a class="list-group-item list-group-item-action d-flex align-items-center" style="height: 50px; padding-left:32px" href="/user/passwordSettings">Password</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-xl-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">
                            <div class="card">
                                <div class="card-header py-3" style="background-color: black; height:62px">
                                <h2 style="color: white; font-size:1.5rem"><?php echo $params['cardTitle'] ?></h2>
                                </div>
                                <div class="card-body">
                                    <?php echo $params['content'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include('footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>