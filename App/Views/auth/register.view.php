<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body px-5 py-5">
                            <?php
                            if (isset($params['errors'])) {
                                foreach ($params['errors'] as $error) {
                                    echo '<p class="text-danger">' . $error . '<p>';
                                };
                            }
                            ?>
                            <h4 class="text-bold text-left mb-4">Create an account</h4>

                            <form action="/user/registerProcess" method="post" enctype="multipart/form-data">

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="username" type="text" id="form3Example1cg" class="form-control" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="email" type="email" id="form3Example3cg" class="form-control" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="password" type="password" id="form3Example4cg" class="form-control" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="verifyPassword" type="password" id="form3Example4cdg" class="form-control" />
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="address" type="text" id="form3Example1cg" class="form-control" />
                                    <label class="form-label" for="form3Example1cg">Your address</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="number" type="text" id="form3Example1cg" class="form-control" />
                                    <label class="form-label" for="form3Example1cg">Your number</label>
                                </div>
                            
                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input name="imgProfile" type="file" id="form3Example1cg" class="form-control" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" data-mdb-button-init
                                        data-mdb-ripple-init class="btn btn-success btn-block gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="#!"
                                        class="fw-bold text-body"><a href="/auth/login">Login here</a></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>