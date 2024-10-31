<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<br><br>

<div class="container">
    <div class="card" style="max-width: 950px; margin: auto;"> <!-- Ancho máximo de la tarjeta -->
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
                        echo '<p style="color:#F47F22">' . $params['message'] . '<p>';
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
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form action="/book/updateProcess/<?php echo htmlspecialchars($params['book']['id']); ?>" method="post" enctype="multipart/form-data">

                        <div class="d-flex justify-content-between align-items-center"> <!-- Contenedor flex -->
                            <h3 class="box-title mt-5 mb-4" style="color:#F47F22; font-weight:bold; font-size:1.2rem; margin-left:22px;">GENERAL INFO</h3>
                            <label for="coverPhoto" class="btn" style="background-color: #F47F22; color: white; margin-top: 16px; margin-left:360px">Update cover photo</label>
                            <button type="submit" class="btn mt-3" style="background-color: #F47F22; color: white; margin-right: 22px">Save changes</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-product" style="width: 95%; margin: auto;"> <!-- Ancho ajustado de la tabla -->
                                <tbody>
                                    <tr class="align-middle"> <!-- Clase para centrar verticalmente -->
                                        <td width="200" style="color: #F47F22">ISBN</td> <!-- Ajustar ancho de columna -->
                                        <td>
                                            <input class="form-control" type="file" name="coverPhoto" id="coverPhoto" style="display:none;">
                                            <input type="text" name="isbn" value="<?php echo htmlspecialchars($params['book']['isbn']); ?>" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border:none; background: transparent; width: 100%;">
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Title</td>
                                        <td>
                                            <input type="text" name="title" value="<?php echo htmlspecialchars($params['book']['title']); ?>" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border:none; background: transparent; width: 100%;">
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Author</td>
                                        <td>
                                            <input type="text" name="author" value="<?php echo htmlspecialchars($params['book']['author']); ?>" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border:none; background: transparent; width: 100%;">
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Category</td>
                                        <td>
                                            <select name="category" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border: none; width: 100%; appearance: none;">
                                                <?php
                                                foreach ($_SESSION['categories'] as $category) {
                                                    echo '<option value="' . htmlspecialchars($category) . '">' . htmlspecialchars($category) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Synopsis</td>
                                        <td>
                                            <input type="text" name="synopsis" value="<?php echo htmlspecialchars($params['book']['synopsis']); ?>" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border:none; background: transparent; width: 100%;">
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Price</td>
                                        <td>
                                            <input type="text" name="price" value="<?php echo htmlspecialchars($params['book']['price']); ?>" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border:none; background: transparent; width: 100%;">
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td width="200" style="color: #F47F22">Enabled</td>
                                        <td>
                                            <select name="enabled" class="form-control-plaintext" style="padding: 0.375rem 0.75rem; border: none; width: 100%; appearance: none;">
                                                <option value="1" <?php echo $params['book']['enabled'] ? 'selected' : ''; ?>>Enabled</option>
                                                <option value="0" <?php echo !$params['book']['enabled'] ? 'selected' : ''; ?>>Disabled</option>
                                            </select>
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