<form action="/user/updatePassword" method="POST" enctype="multipart/form-data">
  <div data-mdb-input-init class="form-outline mb-4">
    <input name="currentPassword" type="password" id="form2Example27" class="form-control" />
    <label class="form-label" for="form2Example27">Current password</label>
  </div>
  <div data-mdb-input-init class="form-outline mb-4">
    <input name="newPassword" type="password" id="form2Example27" class="form-control" />
    <label class="form-label" for="form2Example27">New password</label>
  </div>
  <div data-mdb-input-init class="form-outline mb-4">
    <input name="verifyNewPassword" type="password" id="form2Example27" class="form-control" />
    <label class="form-label" for="form2Example27">Verify new password</label>
  </div>
  <div class="d-flex align-items-center">
    <button type="submit" style="background-color: #F47F22;" class="btn btn-primary me-4">Update password</button>
    <?php
    if (isset($params['message'])) {
      echo '<p class="mb-0" style="color:#F47F22">' . $params['message'] . '</p>';
    }
    if (isset($params['error'])) {
      echo '<p class="mb-0" style="color:red">' . $params['error'][0] . '</p>';
    }
    ?>
  </div>
</form>