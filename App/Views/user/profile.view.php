<div class="row">
    <div class="col-md-8">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-6">
                    <label>Username</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $_SESSION['userLogged']['username'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $_SESSION['userLogged']['email'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Phone</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $_SESSION['userLogged']['phoneNumber'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Address</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $_SESSION['userLogged']['address'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center">
            <img alt="Andrew Jones" src="<?php echo '../../Public/Assets/img/' . $_SESSION['userLogged']['imgProfile']; ?>" class="rounded-circle img-responsive mt-2" width="128" height="128">
        </div>
    </div>
</div>