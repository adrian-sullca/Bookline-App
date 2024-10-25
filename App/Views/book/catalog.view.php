<main>
    <div class="container-fluid bg-transparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2"> <!-- Más columnas en pantallas grandes y menor espacio entre ellas -->
            <?php foreach ($_SESSION['books'] as $book) { ?>
                <div class="col">
                    <div class="card h-100 d-flex flex-column shadow-sm" style="max-width: 180px; margin: auto;">
                        <div style="position: relative;">
                            <a href="/book/details/<?php echo $book['id'] ?>">
                                <img src="<?php echo $book['coverPhoto']; ?>" class="card-img-top" alt="..." style="object-fit: cover; width: 180px; height: 275px;">
                                <span class="badge rounded-pill" style="position: absolute; bottom: 10px; left: 10px; background-color: #F47F22; color: white; padding: 5px 10px;">
                                    <?php echo $book['category']; ?>
                                </span>
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column" style="padding: 10px;">
                            <h5 class="card-title" style="font-size: 1rem; min-height: 3.8rem; max-height: 3.8rem; overflow: hidden;">
                                <?php echo $book['title']; ?>
                            </h5>
                            <h6 class="card-price" style="font-size: 1.2rem; min-height: 1.5rem; color: #F47F22; ;">
                                <?php echo $book['price']; ?> €
                            </h6>
                            <div class="mt-auto">
                                <a href="/cart/addToCart/<?php echo $book['id']?>" class="btn w-100" style="background-color: #F47F22; color: white;">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<style>
    /* Efecto de hover en la imagen */
    .card img:hover {
        filter: brightness(0.7);
        /* Reduce el brillo al hacer hover */
        transition: 0.3s;
        /* Suaviza la transición */
    }

    /* Establece un tamaño fijo para las imágenes y asegura que se rellene el contenedor */
    .card-img-top {
        object-fit: cover;
        /* Las imágenes rellenarán el contenedor, cortando si es necesario */
        width: 180px;
        /* Ancho fijo */
        height: 275px;
        /* Altura fija */
    }

    /* Control del tamaño del título y precio para asegurar consistencia entre tarjetas */
    .card-title {
        font-size: 1rem;
        min-height: 3rem;
        /* Para asegurar espacio para al menos 2 líneas */
        max-height: 3rem;
        /* Limita el máximo para evitar desbordamiento */
        overflow: hidden;
        /* Evita que el texto se salga del espacio asignado */
    }

    .card-price {
        font-size: 1.2rem;
        min-height: 1.5rem;
        /* Fija la altura del precio */
    }

    /* Asegura que el botón esté siempre en la parte inferior */
    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-body .btn {
        margin-top: auto;
        /* Empuja el botón hacia la parte inferior del contenedor */
    }

    /* Ajusta el margen de las tarjetas para controlar el espaciado */
    .row {
        gap: 10px;
        /* Reduce el espacio entre las tarjetas */
    }

    /* Asegura que el span esté correctamente posicionado sobre la imagen */
    .card a {
        position: relative;
        display: block;
    }

    /* Posicionar la categoría dentro de la imagen */
    .badge {
        position: absolute;
        bottom: 10px;
        /* Ajusta la posición desde la parte inferior */
        left: 10px;
        /* Ajusta la posición desde la izquierda */
    }

    /* Estilos para una apariencia compacta en pantallas más pequeñas */
    @media (max-width: 575.98px) {
        .card {
            max-width: 150px;
            /* Tamaño más pequeño en pantallas móviles */
        }

        .card-img-top {
            width: 150px;
            /* Ajusta el ancho en pantallas pequeñas */
            height: 225px;
            /* Ajusta la altura en pantallas pequeñas */
        }

        .card-title {
            min-height: 2.5rem;
            /* Ajusta el tamaño para pantallas más pequeñas */
        }
    }
</style>