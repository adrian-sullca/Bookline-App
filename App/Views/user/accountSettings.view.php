<form action="/user/update" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Username">
            </div>
            <div class="form-group">
                <label name="number" for="inputUsername">Phone number</label>
                <textarea rows="2" class="form-control" id="inputBio" placeholder="Tell something about yourself"></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <img name="imgProfile" alt="Andrew Jones" src="<?php echo '../../Public/Assets/img/' . $_SESSION['userLogged']['imgProfile']; ?>" class="rounded-circle img-responsive mt-2" width="128" height="128">
                <div class="mt-2">
                    <span class="btn btn-primary"><i class="fa fa-upload"></i></span>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>