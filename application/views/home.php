<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Voting</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('upload/logo/'); ?><?= $sekolah->logo_sekolah ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/tema/') ?><?= $tema ?>" />

  <style>
    .cssbuttons-io-button {
    background: #5D87FF;
    color: white;
    font-family: inherit;
    padding: 0.35em;
    padding-left: 1.2em;
    font-size: 15px;
    font-weight: 500;
    border-radius: 0.9em;
    border: none;
    letter-spacing: 0.05em;
    display: flex;
    align-items: center;
    box-shadow: inset 0 0 1.6em -0.6em #714da6;
    overflow: hidden;
    position: sticky;
    height: 2.8em;
    padding-right: 3.3em;
    cursor: pointer;
  }

  .cssbuttons-io-button .icon {
    background: white;
    margin-left: 1em;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.2em;
    width: 2.2em;
    border-radius: 0.7em;
    box-shadow: 0.1em 0.1em 0.6em 0.2em #7b52b9;
    right: 0.3em;
    transition: all 0.3s;
  }

  .cssbuttons-io-button:hover .icon {
    width: calc(100% - 0.6em);
  }

  .cssbuttons-io-button .icon svg {
    width: 1.1em;
    transition: transform 0.3s;
    color: #7b52b9;
  }

  .cssbuttons-io-button:hover .icon svg {
    transform: translateX(0.1em);
  }

  .cssbuttons-io-button:active .icon {
    transform: scale(0.95);
  }

  </style>
</head>

<body>
<div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
<div class="container">
      <br><br>
      <div class="container-fluid">
        <div class="card" data-aos="fade-right">
          <div class="card-body d-flex align-items-center">
            <img src="<?= base_url('upload/logo/'); ?><?= $sekolah->logo_sekolah ?>" alt="Your Image" width="100" height="100" class="mr-4" data-aos="fade-right" data-aos-delay="300">
            <div class="m-4">
              <h5 class="card-title fw-semibold mb-2" data-aos="fade-right" data-aos-delay="350">E-Voting PILKETOS <?= $sekolah->judul_sekolah ?></h5>
              <p class="card-text mb-0" data-aos="fade-right" data-aos-delay="400">
                Masukkan NIS Anda di form berikut untuk memilih ketua osis.
              </p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <!-- Card untuk gambar -->
            <div class="col-md-4">
              <div class="card" data-aos="fade-right" data-aos-delay="500">
                <div class="card-body text-center">
                <div class="logo-container">
                  <img src="<?= base_url('asset/'); ?>osis.jpeg" id="rotatingImage" alt="Your Image" width="300" height="400" data-aos="fade-right" data-aos-delay="550">
                </div>
                </div>
              </div>
            </div>

            <!-- Card untuk form login -->
            <div class="col-md-8">
              <div class="card" data-aos="fade-right" data-aos-delay="650">
                <div class="card-body">
                  <!-- Form login dengan NIS -->
                  <form method="post" action="<?= site_url('auth/login') ?>" class="d-flex">
                      <div class="mb-3 w-100 me-3">
                          <label for="nis" class="card-title" data-aos="fade-right" data-aos-delay="700">Masukkan NIS Anda</label>
                          <div class="input-group mt-2" data-aos="fade-right" data-aos-delay="750">
                              <input type="text" class="form-control" id="nis" name="nis" placeholder="ex : 22050..">
                              <button type="submit" class="btn btn-primary"><i class="ti ti-search"></i></button>
                          </div>
                      </div>
                  </form>
                  <!-- Tampilkan data siswa di sini jika sudah ditemukan -->
                  <?php if (isset($_POST['nis'])) { // Cek apakah NIS dimasukkan
                    if (!empty($siswa) && $siswa['status'] == 'belum') { ?>
                      <div class="mt-1" data-aos="fade-right" data-aos-delay="800">
                        <label for="data" class="form-label">Data Siswa:</label>
                        <p>NIS: <?= $siswa['NIS']; ?></p>
                        <p>Nama: <?= $siswa['Nama']; ?></p>
                        <p>Kelas: <?= $siswa['Kelas']; ?></p>
                        <p>Status: <?= $siswa['status']; ?></p>
                        <a href="<?= site_url('auth/pilih'); ?>" class="cssbuttons-io-button">
                          Masuk
                          <div class="icon">
                            <svg
                              height="24"
                              width="24"
                              viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path d="M0 0h24v24H0z" fill="none"></path>
                              <path
                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                fill="currentColor"
                              ></path>
                            </svg>
                          </div>
                        </a>
                      </div>
                    <?php } elseif (!empty($siswa) && $siswa['status'] == 'sudah') { ?>
                      <div class="mt-1">
                        <h3>Anda sudah memilih</h3>
                        <label for="data" class="form-label">Data Siswa:</label>
                        <p>NIS: <?= $siswa['NIS']; ?></p>
                        <p>Nama: <?= $siswa['Nama']; ?></p>
                        <p>Kelas: <?= $siswa['Kelas']; ?></p>
                        <p>Status: <?= $siswa['status']; ?></p>
                        <p>Anda tidak bisa memilih lagi.</p>
                      </div>
                    <?php } else { // Jika NIS ditemukan tetapi status bukan 'belum'
                      echo '<div class="mt-1">';
                      echo '<h3>NIS Salah</h3>';
                      echo '<p>Silahkan masukkan NIS yang benar</p>';
                      echo '</div>';
                    }
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div></div>
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
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/sidebarmenu.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/app.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?= base_url('asset/aos/dist/aos.js'); ?>"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>