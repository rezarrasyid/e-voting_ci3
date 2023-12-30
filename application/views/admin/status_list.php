<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Siswa</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <style>
    .status-cell {
        font-weight: bold;
    }

    .belum {
        color: #FA896B;
    }

    .sudah {
        color: #13DEB9;
    }
    /* Pagination styles */
    .pagination {
            display: flex;
            padding: 1em 0;
     }

    .pagination a,
    .pagination strong {
        border: 1px solid silver;
        border-radius: 8px;
        color: black;
        padding: 0.5em;
        margin-right: 0.5em;
        text-decoration: none;
    }

    .pagination a:hover,
    .pagination strong {
        border: 1px solid #008cba;
        background-color: #5D87FF;
        color: white;
    }
  </style>

</head>

<body>
    <div class="main">
        <?php $this->load->view('admin/_partials/side_nav.php') ?>
        <div class="container-fluid">
            <div class="card" data-aos="fade-right">
                <div class="card-body">
        <h1 class="card-title" data-aos="fade-right" data-aos-delay="300">Daftar Status Pemilih</h1><br>
        <div class="col-md-6">
            <a href="<?= site_url('admin/Status/reset_semua'); ?>" class="btn btn-danger m-1" data-aos="fade-right" data-aos-delay="300" onclick="return confirm('Apakah anda benar-benar ingin mereset semua siswa ini, jika semua direset maka data pemilihan juga hilang ?')"><i class="ti ti-trash"></i> Reset Semua Siswa</a>
        </div><br>
        <!-- Form Pencarian -->
        <form action="<?= site_url('admin/Status/cari'); ?>" method="get" data-aos="fade-right" data-aos-delay="300">
                 <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Status Siswa" name="q">
                        <button class="btn btn-outline-secondary" type="submit"><i class="ti ti-search"></i></button>
                </div>
        </form>
        </div>
        </div>
        <div class="card" data-aos="fade-right" data-aos-delay="300">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>
                    <th data-aos="fade-right" data-aos-delay="350">No</th>
                    <th data-aos="fade-right" data-aos-delay="400">NIS</th>
                    <th data-aos="fade-right" data-aos-delay="450">Nama</th>
                    <th data-aos="fade-right" data-aos-delay="500">Status</th>
                    <th class="text-center" data-aos="fade-right" data-aos-delay="550">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $key => $row) { ?>
                <tr>
                    <td data-aos="fade-right" data-aos-delay="650"><?= $key + 1; ?></td>
                    <td data-aos="fade-right" data-aos-delay="700"><?= $row->NIS; ?></td>
                    <td data-aos="fade-right" data-aos-delay="750"><?= $row->Nama; ?></td>
                    <td data-aos="fade-right" data-aos-delay="800" class="status-cell <?= strtolower($row->status); ?>"><?= strtoupper($row->status); ?></td>
                    <td class="text-center" data-aos="fade-right" data-aos-delay="850">
                        <a href="<?= site_url('admin/Status/reset/' . $row->NIS); ?>" class="btn btn-warning m-1" onclick="return confirm('Apakah anda benar-benar ingin mereset status siswa ini?, jika anda mereset siswa ini, maka data pemilihan siswa ini juga akan hilang !')"><i class="ti ti-refresh"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination" data-aos="fade-right" data-aos-delay="900">
            <?=  $this->pagination->create_links(); ?>  
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