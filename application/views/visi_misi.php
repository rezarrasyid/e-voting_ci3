<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Voting</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('upload/logo/'); ?><?= $sekolah->logo_sekolah ?>" />
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/'); ?>logo.png" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/tema/') ?><?= $tema ?>" />
</head>

<body>
<div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
<div class="container"><br><br><br>
      <div class="container-fluid">
        <div class="card" data-aos="fade-right">
          <div class="card-body d-flex align-items-center">
            <img src="<?= base_url('asset/'); ?>visi.gif" alt="Your Image" width="100" height="100" class="mr-4" data-aos="fade-right" data-aos-delay="300">
            <div class="m-4">
              <h5 class="card-title fw-semibold mb-2" data-aos="fade-right" data-aos-delay="350">E-Voting PILKETOS</h5>
              <p class="card-text mb-0" data-aos="fade-right" data-aos-delay="400">
                SMK Assalafiyyah Sleman Yogyakarta! dibawah ini adalah visi & misi dan biodata kandidat.
              </p>
            </div>
          </div>
        </div>
        <div class="container">
              <div class="row">
                  <div class="col-md-12 mb-3">
                      <div class="card" data-aos="fade-right" data-aos-delay="500">
                          <div class="card-body">
                              <a href="<?= base_url('auth/pilih'); ?>" class="btn btn-primary" style="position: absolute; top: 25px; right: 25px;" data-aos="fade-right" data-aos-delay="550"><i class="ti ti-arrow-left"></i>  Kembali</a>
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

      </div>

      </div>
    </div>
  </div></div>
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