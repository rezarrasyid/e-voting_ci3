<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Siswa</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

</head>

<body>
  <div class="main">
    <?php $this->load->view('admin/_partials/side_nav.php') ?>
    <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12 mb-3">
                      <div class="card" data-aos="fade-right" data-aos-delay="500">
                          <div class="card-body">
                              <a href="<?= base_url('admin/Kandidat'); ?>" class="btn btn-primary" style="position: absolute; top: 25px; right: 25px;" data-aos="fade-right" data-aos-delay="550"><i class="ti ti-arrow-left"></i>  Kembali</a>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="card" data-aos="fade-right" data-aos-delay="650">
                                          <!-- Tampilkan gambar kandidat -->
                                          <img src="<?= base_url('upload/kandidat/') . $kandidat['foto_kandidat']; ?>" class="card-img" alt="" width="auto" height="100%" class="mr-4" data-aos="fade-right" data-aos-delay="700">
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <div class="m-4">
                                          <!-- Tampilkan biodata kandidat -->
                                          <h3 data-aos="fade-right" data-aos-delay="750">Biodata Kandidat</h3>
                                          <p data-aos="fade-right" data-aos-delay="800">NIS: <?= $kandidat['NIS_kandidat']; ?></p>
                                          <p data-aos="fade-right" data-aos-delay="850">Nama: <?= $kandidat['nama_kandidat']; ?></p>
                                          <p data-aos="fade-right" data-aos-delay="900">Kelas: <?= $kandidat['kelas_kandidat']; ?></p>
                                          <h3 data-aos="fade-right" data-aos-delay="950">Visi & Misi</h3>
                                          <p data-aos="fade-right" data-aos-delay="1000"><?= $kandidat['visi_misi']; ?></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  </div>

  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/sidebarmenu.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/app.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/dashboard.js"></script>
</body>

</html>
