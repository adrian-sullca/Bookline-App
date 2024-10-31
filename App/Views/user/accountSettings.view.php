<form action="/user/updateAccount" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div data-mdb-input-init class="form-outline mb-4">
                <input name="username" type="text" id="form3Example1cg" class="form-control" />
                <label class="form-label" for="form3Example1cg">Username</label>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input name="phoneNumber" type="text" id="form3Example1cg2" class="form-control" />
                <label class="form-label" for="form3Example1cg2">Phone number</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <img name="imgProfile" id="profileImage" alt="Profile Image" src="<?php echo '../../Public/Assets/img/' . $_SESSION['userLogged']['imgProfile']; ?>" class="rounded-circle img-responsive mt-2" width="128" height="128">
                <div class="mt-2">
                    <input type="file" name="imgProfile" id="imgProfileInput" style="display: none;" accept="image/*" onchange="previewImage(event)">
                    <label for="imgProfileInput" class="btn btn-primary" style="background-color: #F47F22;"><i class="fa fa-upload" style="background-color: #F47F22;"></i> Upload Image</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center">
        <button type="submit" style="background-color: #F47F22;" class="btn btn-primary me-4">Save changes</button>
        <?php
        if (isset($params['message'])) {
            echo '<p class="mb-0" style="color:#F47F22">' . $params['message'] . '</p>';
        }
        if (isset($params['error'])) {
            echo '<p class="mb-0" style="color:red">' . $params['error'] . '</p>';
        }
        ?>
    </div>
</form>

<script>
    // Función para previsualizar la imagen seleccionada
    function previewImage(event) {
        const img = document.getElementById('profileImage'); // Obtenemos la imagen de perfil
        img.src = URL.createObjectURL(event.target.files[0]); // Creamos un URL para la imagen seleccionada
    }
</script>