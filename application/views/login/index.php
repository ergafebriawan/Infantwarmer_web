<div class="container">
  <div class="row">
    <div class="col-12 col-md-5 text-center mt-3 mx-auto p-4">
      <h1 class="h2">Login Control Infantwarmer</h1>
      <p class="lead">Silahkan masuk ke Panel Control</p>
    </div>
  </div>
  <div class="row">
  <div class="col-12 col-md-5 text-center mx-auto p-4">
  <?php if ($this->session->userdata('message')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $this->session->userdata('message'); ?></strong>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
  </div>
  </div>
  
  <div class="row">
    <div class="col-12 col-md-5 mx-auto mt-3">
      <div class="card" style="width: 30rem;">
        <div class="card-body bg-info">
          <form action="<?= base_url('Login/proses_login'); ?>" method="POST">
            <div class="form-group">
              <label for="InputUserID">User ID</label>
              <input type="text" class="form-control" name="inputUserID" placeholder="Enter UserID">
            </div>
            <div class="form-group">
              <label for="InputPassword">Password</label>
              <input type="password" class="form-control" name="inputPassword" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>