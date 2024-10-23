<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="mr-20 w-35">
        <form action="/user/loginProcess" method="post">
            <div class="mb-3 form-check">
                <?php
                // Mostrar mensajes de sesión
                if (isset($params['message'])) {
                    echo '<p>' . $params['message'] . '</p>';
                    unset($params['message']);
                }

                if (isset($params['error'])) {
                    echo '<p>' . $params['error'] . '</p>';
                    unset($params['error']);
                }
                ?>
            </div>
            <div class="mb-3 form-check">
                <p>Login</p>
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="mb-3 form-check">
                <input class="form-control" type="password" name="password" placeholder="·······">
            </div>
            <div class="mb-3 form-check">
                <button class="btn btn-primary">Login</button>
                <a href="/user/loginWithGoogle" class="btn btn-danger">Login with Google</a>
            </div>
        </form>
    </div>
    <?php
    // Mostrar el array de usuarios en la sesión para depuración
    if (isset($_SESSION['users'])) {
        echo '<pre>';
        print_r($_SESSION['users']);
        echo '</pre>';
    }
    ?>
</div>