<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="mr-20 w-35">
        <form action="/user/registerProcess" method="post" enctype="multipart/form-data">
            <div class="mb-3 form-check">
                <?php
                if (isset($params['errors'])) {
                    foreach ($params['errors'] as $error) {
                        echo '<p>' . $error . '<p>';
                    };
                }
                ?>
            </div>
            <div class="mb-3 form-check">
                <p>Register</p>
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="email" name="email" placeholder="name@gmail.com">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="password" name="password" placeholder="·······">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="password" name="verifyPassword" placeholder="·······">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="text" name="address" placeholder="Address">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="text" name="number" placeholder="63X XX XX XX">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="file" name="imgProfile" id="" placeholder="Image profile">
            </div>
            <div class="mb-3 form-check">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>