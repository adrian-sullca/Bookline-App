<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center justify-content-center">
            <div class="col-md-3 d-flex justify-content-center" style="padding-bottom: 20px;">
                <img class="card-img-top mb-2 mb-md-0" src="<?php echo htmlspecialchars($params['book']['coverPhoto']); ?>" alt="..."
                    style="max-width: 330px; height: 100%; border-radius: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);" />
            </div>
            <div class="col-md-6 d-flex flex-column">
                <div class="small mb-1">ISBN: <?php echo htmlspecialchars($params['book']['isbn']); ?></div>
                <h2 class="display-7 fw-bolder"><?php echo htmlspecialchars($params['book']['title']); ?></h2>
                <div class="fs-5 mb-2">
                    <span><?php echo htmlspecialchars($params['book']['price']); ?> €</span>
                </div>
                <p class="lead"><strong style="font-weight: bold;">Category: </strong><?php echo htmlspecialchars($params['book']['category']); ?></p>
                <p class="lead"><strong style="font-weight: bold;">Author: </strong><?php echo htmlspecialchars($params['book']['author']); ?></p>
                <p class="lead"><strong style="font-weight: bold;">Synopsis: </strong><?php echo htmlspecialchars($params['book']['synopsis']); ?></p>
                <div class="d-flex">
                    <button class="btn" type="button" style="background-color: #F47F22; color: white;">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>