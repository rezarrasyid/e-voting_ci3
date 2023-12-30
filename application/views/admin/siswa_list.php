<!DOCTYPE html>
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
            <div class="card" data-aos="fade-right" data-aos-once="true">
                <div class="card-body">
                    <h1 class="card-title">Daftar Pemilih</h1><br>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="<?= site_url('admin/Siswa/tambah'); ?>" class="btn btn-primary" data-aos="fade-right" data-aos-delay="300" data-aos-once="true"><i class="ti ti-plus"></i> Tambah Siswa</a>
                            <a href="<?= site_url('admin/Siswa/hapus_semua'); ?>" class="btn btn-danger m-1" data-aos="fade-right" data-aos-delay="300" onclick="return confirm('Apakah anda benar-benar ingin menghapus seluruh siswa ini ?')"><i class="ti ti-trash"></i> Hapus Semua Siswa</a>
                        </div>
                        <div class="col-md-6">
                            <!-- Form Excel -->
                            <?= form_open_multipart('admin/Siswa/import_excel') ?>
                            <div class="input-group" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">
                                <input type="file" class="form-control" id="importexcel" name="importexcel" accept=".xlsx, .xls">
                                <button type="submit" class="btn btn-success"><i class="ti ti-upload"></i> Import Excel</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>

                    <!-- Form Pencarian -->
                    <form action="<?= site_url('admin/Siswa/cari'); ?>" method="get" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari NIS, Nama, Kelas" name="q">
                            <button class="btn btn-outline-secondary" type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </form>
                </div>
                </div>

                <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                 <?php endif; ?>


                    <div class="card" data-aos="fade-right" data-aos-delay="300" data-aos-once="true">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th data-aos="fade-right" data-aos-delay="350" data-aos-once="true">No</th>
                                            <th data-aos="fade-right" data-aos-delay="400" data-aos-once="true">NIS</th>
                                            <th data-aos="fade-right" data-aos-delay="450" data-aos-once="true">Nama</th>
                                            <th data-aos="fade-right" data-aos-delay="500" data-aos-once="true">Kelas</th>
                                            <th class="text-center" data-aos="fade-right" data-aos-delay="550" data-aos-once="true">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $key => $row) { ?>
                                            <tr>
                                                <td data-aos="fade-right" data-aos-once="true"><?= $key + 1 + $offset; ?></td>
                                                <td data-aos="fade-right" data-aos-once="true"><?= $row->NIS; ?></td>
                                                <td data-aos="fade-right" data-aos-once="true"><?= $row->Nama; ?></td>
                                                <td data-aos="fade-right" data-aos-once="true"><?= $row->Kelas; ?></td>
                                                <td class="text-center" data-aos="fade-right"  data-aos-once="true">
                                                    <a href="<?= site_url('admin/Siswa/edit/' . $row->id_pemilih); ?>" class="btn btn-warning m-1"><i class="ti ti-edit"></i></a>
                                                    <a href="<?= site_url('admin/Siswa/delete/' . $row->id_pemilih); ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah anda benar-benar ingin menghapus siswa ini ?')"><i class="ti ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="pagination">
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
        AOS.init({
            once: true,  // Aktifkan once untuk setiap elemen
            startEvent: 'DOMContentLoaded',  // Mulai animasi saat DOM dimuat
        });
    </script>
</body>

</html>
