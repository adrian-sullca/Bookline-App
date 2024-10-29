<main>
    <div class="container-fluid bg-transparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2"> <!-- Más columnas en pantallas grandes y menor espacio entre ellas -->
            <?php foreach ($_SESSION['books'] as $book) {
                // Solo mostrar libros que tienen enabled como true
                if ($book['enabled']) { ?>
                    <div class="col">
                        <div class="card h-100 d-flex flex-column shadow-sm" style="max-width: 180px; margin: auto;">
                            <div style="position: relative;">
                                <a href="/book/details/<?php echo $book['id'] ?>">
                                    <img src="<?php echo $book['coverPhoto']; ?>" class="card-img-top" alt="..." style="object-fit: cover; width: 180px; height: 275px;">
                                    <span class="badge rounded-pill" style="position: absolute; bottom: 10px; left: 10px; background-color: #F47F22; color: white; padding: 5px 10px;">
                                        <?php echo htmlspecialchars($book['category']); ?>
                                    </span>
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column" style="padding: 10px;">
                                <h5 class="card-title" style="font-size: 1rem; min-height: 3.8rem; max-height: 3.8rem; overflow: hidden;">
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </h5>
                                <h6 class="card-price" style="font-size: 1.2rem; min-height: 1.5rem; color: #F47F22;">
                                    <?php echo htmlspecialchars($book['price']); ?> €
                                </h6>
                                <div class="mt-auto">
                                    <a href="/cart/addToCart/<?php echo $book['id'] ?>" class="btn w-100" style="background-color: #F47F22; color: white;">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
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
</style>