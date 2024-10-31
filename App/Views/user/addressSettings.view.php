<form action="/user/updateAddress" method="POST" enctype="multipart/form-data">
  <div data-mdb-input-init class="form-outline mb-4">
    <input name="address" type="text" id="form3Example1cg" class="form-control" />
    <label class="form-label" for="form3Example1cg">Address</label>
  </div>
  <div class="d-flex align-items-center">
    <button type="submit" style="background-color: #F47F22;" class="btn btn-primary me-4">Update address</button>
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