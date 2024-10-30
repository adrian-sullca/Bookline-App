<!-- Pills navs -->
<div style="width: 30%; margin:auto; margin-top:80px; margin-bottom:90px;">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-login" data-mdb-pill-init href="/auth/login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-register" style="background-color: #F47F22;" data-mdb-pill-init href="/auth/register" role="tab"
                aria-controls="pills-register" aria-selected="true">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->
    <?php 
    if (isset($params['errors'])) {
        foreach ($params['errors'] as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
    }
    ?>
    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="/auth/registerProcess" method="post" enctype="multipart/form-data">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="username" type="text" id="form3Example1cg" class="form-control" />
                    <label class="form-label" for="form3Example1cg">Your username</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" id="form3Example3cg" class="form-control" />
                    <label class="form-label" for="form3Example3cg">Your email</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form3Example4cg" class="form-control" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="verifyPassword" type="password" id="form3Example4cdg" class="form-control" />
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="address" type="text" id="form3Example1cg" class="form-control" />
                    <label class="form-label" for="form3Example1cg">Your address</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-3">
                    <input name="number" type="text" id="form3Example1cg" class="form-control" />
                    <label class="form-label" for="form3Example1cg">Your phone number</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-3">
                    <input name="imgProfile" type="file" id="form3Example1cg" class="form-control" />
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
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="background-color: #F47F22;">Register</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Have already an account? <a href="/auth/login" style="color: #F47F22;">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Pills content -->
</div>