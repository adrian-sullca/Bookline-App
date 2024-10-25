<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="../../../Public/Assets/img/libros2.avif"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="/auth/loginProcess" method="post">

                                    <h4 class="text-bold text-left mb-4">Login</h4>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="username" type="username" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Username</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Login</button>
                                    </div>
                                    <hr class="my-4">

                                    <a href="/auth/loginWithGoogle" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                        type="submit"><i class="fab fa-google me-2"></i>Sign in with google</a>
                                    <br>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/auth/register"
                                            style="font-style:bold;">Register here</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>