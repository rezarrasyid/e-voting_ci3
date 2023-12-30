<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Kelas</title>
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
			<h1 class="card-title fw-semibold mb-4">Edit Nama Kelas</h1>
			<?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
            <?php endif; ?>
			<div class="card">
				<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<label for="title" class="form-label mb-3">Nama Kelas</label>
				<input type="text" class="form-control mb-3" name="nama_kelas" value="<?= $kelas->Nama_kelas ?>" placeholder="Nama Kelas"/>
				<label for="title" class="form-label mb-3">Token Kelas</label>
				<input type="text" class="form-control mb-3" name="token" value="<?= $kelas->token ?>" placeholder="Token Kelas"/>
				<div>
					<button type="submit" name="tambah" class="btn btn-primary m-1" value="false">Save</button>
				</div>
			</form>
			</div>
			</div>
			</div>
		</div>
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