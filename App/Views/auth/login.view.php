<!-- Pills navs -->
<div style="width: 30%; margin:auto; margin-top:80px; margin-bottom:90px;">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-pill-init href="/auth/login" role="tab"
                style="background-color: #F47F22;"
                aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-pill-init href="/auth/register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form action="/auth/loginProcess" method="post">
                <div class="text-center mb-3">
                    <p>Sign in with:</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1" style="background-color: black;">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <a href="/auth/loginWithGoogle">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1" style="background-color: black;">
                            <i class="fab fa-google"></i>
                        </button>
                    </a>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1" style="background-color: black;">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1" style="background-color: black;">
                        <i class="fab fa-github"></i>
                    </button>
                </div>

                <p class="text-center">or:</p>
                <?php
                if (isset($params['message'])) {
                    echo '<p class="text-center" style="color:#F47F22">' . $params['message'] . '</p>';
                }
                if (isset($params['error'])) {
                    echo '<p class="text-center" style="color:red">' . $params['error'] . '</p>';
                }
                ?>
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="username" type="text" id="form3Example1cg" class="form-control" />
                    <label class="form-label" for="form3Example1cg">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example27" class="form-control" />
                    <label class="form-label" for="form2Example27">Password</label>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!" style="color: #F47F22;">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="background-color: #F47F22;">Login</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Don't have an account? <a href="/auth/register" style="color: #F47F22;">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Pills content -->
</div>