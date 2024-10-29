<?php
if (isset($params['books'])) {
    if (empty($params['books'])) { ?>
        <p>No results</p>
    <?php } else {
        foreach ($params['books'] as $book) {
            ?>
            <div>
                <div class="card h-100 d-flex flex-column shadow-sm" style="max-width: 180px;">
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
<?php
        }
    }
}
?>

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
</style>