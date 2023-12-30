<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin E-Voting PILKETOS</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="main">
    <?php $this->load->view('admin/_partials/side_nav.php') ?>
    <div class="container-fluid">
      <!-- Row 1: Card Overview -->
      <div class="row mb-4">
        <!-- Jumlah Seluruh Siswa -->
        <div class="col-md-3">
          <div class="card" data-aos="fade-right" data-aos-delay="300">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Seluruh Siswa</h5>
              <p class="card-text fs-3"><?= $jumlah_siswa ?></p>
            </div>
          </div>
        </div>
        <!-- Jumlah Siswa yang Sudah Memilih -->
        <div class="col-md-3">
          <div class="card" data-aos="fade-right" data-aos-delay="400">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Siswa Sudah Memilih</h5>
              <p class="card-text fs-3"><?= $jumlah_siswa_sudah ?></p>
            </div>
          </div>
        </div>
        <!-- Jumlah Siswa yang Belum Memilih -->
        <div class="col-md-3">
          <div class="card" data-aos="fade-right" data-aos-delay="500">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Siswa Belum Memilih</h5>
              <p class="card-text fs-3"><?= $jumlah_siswa_belum ?></p>
            </div>
          </div>
        </div>
        <!-- Jumlah Kandidat -->
        <div class="col-md-3">
          <div class="card" data-aos="fade-right" data-aos-delay="600">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Kandidat</h5>
              <p class="card-text fs-3"><?= $jumlah_kandidat ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- selamat datang -->
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card" data-aos="fade-right" data-aos-delay="700">
          <div class="card-body d-flex align-items-center">
            <img src="<?= base_url('asset/'); ?>lg.png" alt="Your Image" width="100" height="100" class="mr-4">
            <div class="m-4">
              <h5 class="card-title fw-semibold mb-2">Selamat datang di admin E-Voting PILKETOS</h5>
              <p class="card-text mb-0">
                Untuk melihat data terbaru klik Ctrl+R !
              </p>
            </div>
            <a href="<?= site_url('admin/Dashboard/hapus_semua_data'); ?>" class="btn btn-danger m-1" data-aos="fade-right" data-aos-delay="300"><i class="ti ti-refresh"></i> Reset Aplikasi !</a>
          </div>
        </div>
        </div>
      </div>

      <!-- Row 4: Recent Transactions -->
      <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100" data-aos="fade-right" data-aos-delay="800">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold">Grafik Hasil Pemilihan</h5>
                            <canvas id="myChart" width="150" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100" data-aos="fade-right" data-aos-delay="900">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold">Persentase Pemilihan Kandidat</h5>
                            <div class="table-responsive">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Nama Kandidat</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Foto</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Presentase</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_kandidat as $kandidat) : ?>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1"><?= $kandidat->nama_kandidat ?></h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal"><img
                                                            src="<?= base_url('upload/kandidat/') . $kandidat->foto_kandidat; ?>"
                                                            class="rounded-circle" alt="" width="35" height="35"
                                                            class="mr-4"></p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <?php
                                                    $id_kandidat = $kandidat->id_kandidat;
                                                    // Gantilah ini dengan logika Anda sendiri untuk mengambil jumlah siswa yang memilih kandidat dari database
                                                    $this->load->model('pilihan_model');
                                                    $jumlah_siswa_memilih = $this->pilihan_model->get_jumlah_memilih_kandidat($id_kandidat);
                                                    // Gantilah ini dengan total siswa pada sekolah
                                                    $total_siswa = $jumlah_siswa; // Contoh angka, gantilah dengan data dari database
                                                    // Hitung persentase
                                                    $persentase = ($jumlah_siswa_memilih / $total_siswa) * 100;
                                                    ?>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Example with label" aria-valuenow="<?= $persentase ?>"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar"
                                                            style="width: <?= $persentase ?>%"><?= $persentase ?>%
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      <!-- Row 5: Product Cards -->
      <div class="row">
        <!-- ... (existing content) ... -->
      </div>

      <!-- Row 6: Footer -->
      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design by <a href="#" target="_blank"
            class="pe-1 text-primary text-decoration-underline">Reza Rasyid</a>Template Admin by <a href="#" target="_blank"
            class="pe-1 text-primary text-decoration-underline">Themewagon</a> Developer by <a
            href="#">Reza Rasyid</a></p>
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
  <script src="<?= base_url('asset/aos/dist/aos.js'); ?>"></script>
  <script>
    AOS.init();
  </script>
  <script>
  $(document).ready(function () {
    // Ambil data pilihan dari PHP dan konversi ke format yang dapat digunakan oleh Chart.js
    var pilihan = <?php echo json_encode($pilihan); ?>;
    var kandidat = <?php echo json_encode($data_kandidat); ?>;

    // Objek untuk menyimpan jumlah pemilih setiap kandidat
    var hasilPemilihan = {};

    // Hitung jumlah pemilih setiap kandidat
    pilihan.forEach(function (pilihan) {
        var idKandidat = pilihan.id_kandidat;
        var nis = pilihan.NIS;

        if (!hasilPemilihan[idKandidat]) {
            hasilPemilihan[idKandidat] = [];
        }

        hasilPemilihan[idKandidat].push(nis);
    });

    // Inisialisasi array untuk label dan data pada grafik donat
    var labels = [];
    var data = [];

    // Loop melalui hasilPemilihan dan masukkan nilai ke array label dan data
    for (var idKandidat in hasilPemilihan) {
        var jumlahPemilih = hasilPemilihan[idKandidat].length;

        // Cari objek kandidat berdasarkan id_kandidat
        var objKandidat = kandidat.find(function (k) {
            return k.id_kandidat === idKandidat;
        });

        // Ambil nama_kandidat dari objek kandidat
        var namaKandidat = objKandidat.nama_kandidat;

        labels.push(namaKandidat);
        data.push(jumlahPemilih);
    }

    // Buat grafik menggunakan Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pemilih',
                data: data,
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 205, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            cutout: '50%' // Mengatur seberapa besar "hole" di tengah grafik donat
        }
    });
});

</script>
</body>

</html>
