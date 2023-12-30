<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <!-- <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" /> -->
  <link rel="stylesheet" href="<?= base_url('asset/admin/src');?>/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= base_url('asset/'); ?>Frame.png" width="180" alt="">
                </a>
                <p class="text-center">E-Voting  PILKETOS</p>
                <?php if($this->session->flashdata('message_login_error')): ?>
                  <div class="invalid-feedback">
                      <?= $this->session->flashdata('message_login_error') ?>
                  </div>
                <?php endif ?>
                <form method="post">
                  <div class="mb-3">
                    <label for="name" class="form-label">Token Kelas</label>
                    <input type="text" name="token" class="form-control" class="<?= form_error('token') ? 'invalid' : '' ?>">
                    <?= form_error('username') ?>
                  </div>
                  <!-- <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" class="<?= form_error('password') ? 'invalid' : '' ?>">
                  </div> -->
                  <?= form_error('password') ?>
                  <input type="submit" value="Submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('/asset/admin/src/');?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('/asset/admin/src/');?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>