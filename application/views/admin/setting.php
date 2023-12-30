<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Setting</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
</head>

<body>
	<main class="main">
	<?php $this->load->view('admin/_partials/side_nav.php') ?>

	<div class="container-fluid">
			<div class="card" data-aos="fade-right" data-aos-once="true">
				<div class="card-body">
				<h1 class="card-title fw-semibold mb-4" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">Settings</h1>

				<div class="card" data-aos="fade-right" data-aos-delay="400" data-aos-once="true">
					<div class="card-header">
					<b data-aos="fade-right" data-aos-delay="450" data-aos-once="true">Avatar Admin</b>
					</div>
					<div class="card-body">
					<div style="display: flex; gap: 1em">
						<?php
					$avatar = $current_user->avatar ?
						base_url('upload/avatar/' . $current_user->avatar)
						: get_gravatar($current_user->email)
					?>
					<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80" class="rounded-circle" data-aos="fade-right" data-aos-delay="500" data-aos-once="true">
					<p class="my-4" data-aos="fade-right" data-aos-delay="550" data-aos-once="true">
					<a href="<?= site_url('admin/setting/remove_avatar') ?>" class="btn btn-danger m-1">Remove Avatar</a>
					<a href="<?= site_url('admin/setting/upload_avatar') ?>" class="btn btn-info m-1">Edit Avatar</a>
					</p>
					</div>
				</div></div>
			
				<div class="card" data-aos="fade-right" data-aos-delay="650" data-aos-once="true">
					<div class="card-header">
				<b data-aos="fade-right" data-aos-delay="700" data-aos-once="true">Profile Settings</b>
				</div>
					<div class="card-body">
						<div class="card-text" data-aos="fade-right" data-aos-delay="750" data-aos-once="true">
						Name: <span class="text-gray"><?= html_escape($current_user->name) ?></span>
						<br>
						Email: <span class="text-gray"><?= html_escape($current_user->email) ?></span>
						</div>
						<br>
						<a href="<?= site_url('admin/setting/edit_profile') ?>" class="btn btn-primary" data-aos="fade-right" data-aos-delay="800" data-aos-once="true">Edit Profile</a>
						</div>
					</div>
				
				<div class="card" data-aos="fade-right" data-aos-delay="900" data-aos-once="true">
				<div class="card-header">
						<b>Security & Password</b>
				</div>
					<div class="card-body">
						<div class="card-text" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">
						Your Password: <span class="text-gray">******</span>
						<br>
						Terakhir diubah: <span class="text-gray"><?= $current_user->password_updated_at ?></span>
						</div>
						<br>
						<a href="<?= site_url('admin/setting/edit_password') ?>" class="btn btn-primary" data-aos="fade-right" data-aos-delay="350" data-aos-once="true">Edit Password</a>
					</div></div>
				</div>
				</div>
			</div>

			
		</div></div>
	</main>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/js/sidebarmenu.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/js/app.min.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="<?= base_url('asset/admin/src'); ?>/assets/js/dashboard.js"></script>
        <script src="<?= base_url('asset/aos/dist/aos.js'); ?>"></script>

	<?php if ($this->session->flashdata('message')) : ?>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>
    <script>
        AOS.init({
            once: true,  // Aktifkan once untuk setiap elemen
            startEvent: 'DOMContentLoaded',  // Mulai animasi saat DOM dimuat
        });
    </script>
</body>

</html>