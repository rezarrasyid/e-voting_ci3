<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Kandidat</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <style>
    
    

  </style>
</head>

<body>
  <div class="main">
    <?php $this->load->view('admin/_partials/side_nav.php') ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4" data-aos="fade-up">
            <div class="card-body">
              <h6 class="card-title mb-1">Daftar Para Kandidat</h6><br>
              <a href="<?= site_url('admin/Kandidat/hapus_semua'); ?>" class="btn btn-danger" onclick="return confirm('Apakah anda benar-benar ingin menghapus semua kandidat ?')"><i class="ti ti-trash"></i> Hapus Semua Kandidat</a>
              </div>
            </div>
            </div>
            <div class="card-body">
              <div class="row">
              <?php if (!empty($kandidat)) { ?>
                <?php foreach($kandidat as $kandidat ) : ?>
                  <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 position-relative" >
                    <div class="card card-blog card-plain" data-aos="fade-up" data-aos-delay="200">
                      <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src="<?= base_url('upload/kandidat/' . $kandidat->foto_kandidat) ?>" alt="img-blur-shadow" class="card-img-top" >
                        </a>
                      </div>
                      <div class="card-body text-center">
                        <a href="javascript:;">
                          <h5>
                            <?=  $kandidat->nama_kandidat ?>
                          </h5>
                        </a>
                        <div class="d-flex align-items-center btn-group">
                          <a href="<?= site_url('admin/Kandidat/detail/'.$kandidat->id_kandidat) ?>" class="btn-info-modal">
                              <button class="btn btn-info m-1">
                                  <i class="ti ti-eye" style="font-size:1.5em;"></i>
                              </button>
                          </a>
                          <a href="<?= site_url('admin/Kandidat/edit/'.$kandidat->id_kandidat) ?>">
                            <button class="btn btn-success m-1">
                              <i class="ti ti-edit" style="font-size:1.5em;"></i>
                            </button>
                          </a>
                          <a href="<?= site_url('admin/Kandidat/delete/' . $kandidat->id_kandidat) ?>" onclick="return confirm('Apakah anda benar-benar ingin menghapus kandidat ini ?')">
                            <button class="btn btn-danger m-1" type="submit" name="hapus_pilihan" value="<?= $kandidat->id_kandidat ?>">
                              <i class="ti ti-trash" style="font-size:1.5em;"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
                <?php } else { ?>
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">Data Kandidat Tidak Ditemukan</h5>
                    <p class="card-text">Mohon maaf, data kandidat tidak tersedia atau kandidat tidak ditemukan.</p>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="400">
                  <a href="<?= site_url('admin/Kandidat/tambah') ?>" class="d-block">
                    <div class="card h-100 card-plain border add-card"><b><br><br><br><br><br><br><br>
                      <div class="card-body d-flex flex-column justify-content-center text-center">
                        <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                        <h1 class=" text-secondary">+</h1><br><br><br><br><br><br><br>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" data-aos="fade-up" data-aos-delay="400">
                  <a href="<?= site_url('admin/Kandidat/tambah') ?>" class="d-block">
                    <div class="card h-100 card-plain border add-card"><b><br><br><br><br><br><br><br>
                      <div class="card-body d-flex flex-column justify-content-center text-center">
                        <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                        <h1 class=" text-secondary">+</h1><br><br><br><br><br><br><br>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
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
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?= base_url('asset/admin/src'); ?>/assets/js/dashboard.js"></script>
  <script src="<?= base_url('asset/aos/dist/aos.js'); ?>"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
