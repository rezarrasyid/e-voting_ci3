<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Setting</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
			<h1 class="card-title fw-semibold mb-4">Reset Password</h1>

			<form action="" method="POST">
				<div>
					<label for="password">Password Baru</label>
					<input type="password" name="password" class="form-control mb-3" class="<?= form_error('password') ? 'invalid' : '' ?>"
					value="<?= set_value("password") ?>" required/>
					<div class="invalid-feedback">
						<?= form_error('password') ?>
					</div>
				</div>
				<div>
					<label for="password_confirm">Konfirmasi Password Baru</label>
					<input type="password" name="password_confirm" class="form-control mb-3" class="<?= form_error('password_confirm') ? 'invalid' : '' ?>"
					value="<?= set_value("password_confirm") ?>" required/>
					<div class="invalid-feedback">
						<?= form_error('password_confirm') ?>
					</div>
				</div>

				<div>
					<button type="submit" name="save" class="btn btn-primary mb-3">Save Password</button>
				</div>
				</div>
				</div>
			</form>
		</div>
	</main>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/app.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/dashboard.js"></script>
</body>

</html>