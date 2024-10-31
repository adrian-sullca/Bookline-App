<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<br><br>
<div class="container">
    <div class="card" style="max-width: 950px; margin: auto;">
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-6">
                    <div class="white-box text-center">
                        <img class="card-img-top mb-2" src="<?php echo htmlspecialchars($params['book']['coverPhoto']); ?>" alt="..." style="max-width: 330px; height: 100%; border-radius: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);" />
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-6">
                    <br><br>
                    <?php
                    if (isset($params['message'])) {
                        echo '<p style="color:#F47F22">' . $params['message'] . '</p>';
                    }

                    if (isset($params['errors'])) {
                        print_r($params['errors']);
                    }
                    ?>
                    <div class="small mb-1">ISBN: <?php echo htmlspecialchars($params['book']['isbn']); ?></div>
                    <h2 class="display-7 fw-bolder"><?php echo htmlspecialchars($params['book']['title']); ?></h2>
                    <p><?php echo htmlspecialchars($params['book']['synopsis']); ?></p>
                    <h2 class="mt-25" style="color: black; font-size:1.5rem;">
                        <?php echo htmlspecialchars($params['book']['price']); ?> € <small class="text-success" style="font-size:1.4rem">(Free shipping)</small>
                    </h2>
                    <?php
                    if ($_SESSION['userLogged']['rol'] == 'client') {
                    ?>
                        <a href="/cart/addToCart/<?php echo $params['book']['id'] ?>">
                            <button type="submit" class="btn mt-3" style="background-color: #F47F22; color: white; margin-right: 22px">Add to cart</button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form action="/book/updateProcess/<?php echo htmlspecialchars($params['book']['id']); ?>" method="post" enctype="multipart/form-data">

                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="box-title mt-5 mb-4" style="color:#F47F22; font-weight:bold; font-size:1.2rem; margin-left:22px;">GENERAL INFO</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-product" style="width: 95%; margin: auto;">
                                <tbody>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">ISBN</td>
                                        <td><?php echo htmlspecialchars($params['book']['isbn']); ?></td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Title</td>
                                        <td><?php echo htmlspecialchars($params['book']['title']); ?></td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Author</td>
                                        <td><?php echo htmlspecialchars($params['book']['author']); ?></td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Category</td>
                                        <td><?php echo htmlspecialchars($params['book']['category']); ?></td> <!-- Asegúrate de que la categoría esté disponible -->
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Synopsis</td>
                                        <td><?php echo htmlspecialchars($params['book']['synopsis']); ?></td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Price</td>
                                        <td><?php echo htmlspecialchars($params['book']['price']); ?> €</td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Enabled</td>
                                        <td>
                                            <?php echo $params['book']['enabled'] ? 'Enabled' : 'Disabled'; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>