<?php
echo '<pre>';
print_r($_SESSION['userLogged']);
echo '</pre>';
?>

<form action="/user/update" method="POST" enctype="multipart/form-data">

    <div class="mb-3 form-check">
        <?php
        if (isset($params['message'])) {
            echo '<p>' . $params['message'] . '</p>';
            unset($params['message']);
        }

        if (isset($params['errors'])) {
            foreach ($params['errors'] as $error) {
                echo '<p>' . $error . '<p>';
            };
        }
        ?>
    </div>
    <p>Username</p>
    <input type="text" name="username" value="<?php echo $_SESSION['userLogged']['username'] ?>">

    <!-- 
No se puede actualizar email porque volveria a mandar verificacion al email . IMPLEMENTAR MEJORA
<p>Email</p>
<input type="text" name="email" value="<PHPecho $_SESSION['userLogged']['email']PHP>"> -->
    <p>Password</p>
    <input type="text" name="newPassword" value="<?php echo $_SESSION['userLogged']['password'] ?>">
    <?php
    if ($_SESSION['userLogged']['rol'] != 'admin') { ?>
        <p>Address</p>
        <input type="text" name="address" value="<?php echo $_SESSION['userLogged']['address'] ?>">
        <p>PhoneNumber</p>
        <input type="text" name="phoneNumber" value="<?php echo $_SESSION['userLogged']['phoneNumber'] ?>">
    <?php
    }
    ?>

    <p>Imagen</p>

    <input class="form-control" type="file" name="img" id="imgProfile"> <!-- style="display: none; -->

    <img src="<?php echo '../../Public/Assets/img/' . $_SESSION['userLogged']['imgProfile']; ?>" alt="Profile Image" style="width:150px; height:150px;">

    <label for="imgProfile" class="btn btn-primary">Update Image</label>

    <button type="submit">Update credentials</button>
</form>