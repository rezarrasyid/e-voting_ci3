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
  <style>
    .theme-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    .theme-button {
      width: 90px;
      height: 50px;
      background-size: cover;
      border: 1px solid #5D87FF;
      cursor: pointer;
    }

    .theme-button:focus {
      outline: none;
    }

    /* Contoh styling tambahan */
    .theme-button:hover {
      opacity: 0.8;
    }

    /* Penambahan CSS untuk memberi jarak antara card tema dengan card ubah sekolah */
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <main class="main">
    <?php $this->load->view('admin/_partials/side_nav.php') ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mb-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
          <!-- Card dengan gambar latar belakang -->
          <div class="card h-100 p-3">
            <div class="card-img overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url('upload/tema/');
                if ($sekolah->tema === 'dark.css') {
                  echo 'dark.png';
                } elseif ($sekolah->tema === 'default') {
                  echo 'default.jpg';
                } elseif ($sekolah->tema === 'gradient.css') {
                  echo 'gradient.jpg';
                } else {
                  echo $sekolah->tema;
                }
                ?>'); background-size='cover';">
              <span class="mask"></span><br>
              <div class="container-fluid">
                <div class="card" style="background-image: url('<?= base_url('upload/tema/');
                if ($sekolah->tema === 'dark.css') {
                  echo 'abu.png';
                } elseif ($sekolah->tema === 'default') {
                  echo 'default.jpg';
                } elseif ($sekolah->tema === 'gradient.css') {
                  echo 'gradien.jpg';
                } else {
                  echo $sekolah->tema;
                }
                ?>'); background-size='cover';" data-aos="fade-right">
                  <div class="card-body d-flex align-items-center">
                    <img src="<?= base_url('upload/logo/') . $sekolah->logo_sekolah ?>" alt="Your Image" width="100" height="100" class="mr-4" data-aos="fade-right" data-aos-delay="300">
                    <div class="m-4">
                      <div>
                        <h5 class="card-title fw-semibold mb-2" data-aos="fade-right" data-aos-delay="350" style="
                          color: <?php
                            if ($sekolah->tema === 'dark.css') {
                              echo 'white';
                            } elseif ($sekolah->tema === 'default') {
                              echo 'black';
                            } elseif ($sekolah->tema === 'gradient.css') {
                              echo 'black';
                            } else {
                              echo $sekolah->tema;
                            }
                            ?>;
                        ">Selamat datang di e-voting PILKETOS <?= $sekolah->judul_sekolah ?></h5>
                        <p class="card-text mb-0" data-aos="fade-right" data-aos-delay="400" style="
                          color: <?php
                            if ($sekolah->tema === 'dark.css') {
                              echo 'white';
                            } elseif ($sekolah->tema === 'default') {
                              echo 'black';
                            } elseif ($sekolah->tema === 'gradient.css') {
                              echo 'black';
                            } else {
                              echo $sekolah->tema;
                            }
                            ?>;
                        ">
                          Masukkan NIS Anda di form berikut untuk memilih ketua osis.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
          <!-- Card tema bawaan -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pilih Tema:</h5>
              <div class="theme-buttons">
                <a href="<?= site_url('admin/sekolah/temabawaan?css=default') ?>">
                  <button class="theme-button card-img" style="background-image: url('<?= base_url('asset/tema/default.jpg') ?>');" data-theme="dark" data-css="path/to/dark-theme.css"></button>
                </a>
                <a href="<?= site_url('admin/sekolah/temabawaan?css=dark.css') ?>">
                  <button class="theme-button card-img" style="background-image: url('<?= base_url('upload/tema/dark.png') ?>');" data-theme="default" data-css="path/to/default-theme.css"></button>
                </a>
                <a href="<?= site_url('admin/sekolah/temabawaan?css=gradient.css') ?>">
                  <button class="theme-button card-img" style="background-image: url('<?= base_url('upload/tema/gradient.jpg') ?>');" data-theme="gradient" data-css="path/to/gradient-theme.css"></button>
                </a>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Status E-Voting</h5>
              <form action="<?= site_url('admin/sekolah/toggle_status'); ?>" method="POST">
                <button type="submit" name="status_aktif" value="aktif" class="btn btn-success m-1" <?= $status == 'aktif' ? 'disabled' : ''; ?>>
                  Aktif
                </button>

                <button type="submit" name="status_nonaktif" value="nonaktif" class="btn btn-danger m-1" <?= $status == 'nonaktif' ? 'disabled' : ''; ?>>
                  Nonaktif
                </button>
              </form>
            </div>
          </div>
          <div class="card" data-aos="fade-up" data-aos-delay="300">
            <div class="card-body">
              <h5>Ubah sekolah</h5>
              <div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <label for="judul_sekolah">Nama sekolah</label>
                  <input type="text" name="judul_sekolah" value="<?= html_escape($sekolah->judul_sekolah) ?>" class="form-control mb-2">
                  <label for="tema">Tema sekolah</label>
                  <input class="form-control mb-2" accept=".png,.jpg,.jpeg" type="file" name="tema" placeholder="Tema Voting" value="<?= html_escape($sekolah->tema) ?>">
                  <label for="logo">Logo sekolah</label>
                  <input class="form-control mb-2" accept=".png,.jpg,.jpeg" type="file" name="logo" placeholder="Tema Voting" value="<?= html_escape($sekolah->logo_sekolah) ?>">
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
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
      once: true, // Aktifkan once untuk setiap elemen
      startEvent: 'DOMContentLoaded', // Mulai animasi saat DOM dimuat
    });
  </script>
</body>

</html>
