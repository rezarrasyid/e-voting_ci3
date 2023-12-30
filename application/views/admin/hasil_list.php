<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Siswa</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="main">
        <?php $this->load->view('admin/_partials/side_nav.php') ?>
        <div class="container-fluid">
           

        <div class="card">
                <div class="card-body">
                <h1 class="card-title">Daftar Hasil Pemilihan</h1>
                <div class="col-4">
                        <div class="d-flex justify-content-center">
                  <!-- Tambahkan di dalam card-body setelah tabel -->
                    <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                      </div>
                      <br><br>
        <br><br>
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>
                    <th>No</th>
                    <th>NIS Pemilih</th>
                    <th>Nama Kandidat</th>
                    <th>Waktu Pemilihan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pilihan as $key => $row) { ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $row->NIS; ?></td>
                    <td><?= $row->id_kandidat; ?></td>
                    <td><?= $row->created_at; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('admin/edit_siswa/' . $row->id_pilihan); ?>" class="btn btn-warning m-1"><i class="ti ti-edit"></i></a>
                        <a href="<?= base_url('admin/Pilihan/delete/' . $row->id_pilihan); ?>" class="btn btn-danger m-1"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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
  <!-- Tambahkan di bagian bawah HTML -->
  <script>
  $(document).ready(function(){
    // Ambil data pilihan dari PHP dan konversi ke format yang dapat digunakan oleh Chart.js
    var pilihan = <?php echo json_encode($pilihan); ?>;

    // Objek untuk menyimpan jumlah pemilih setiap kandidat
    var hasilPemilihan = {};

    // Hitung jumlah pemilih setiap kandidat
    pilihan.forEach(function(pilihan) {
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

      // Dapatkan nama kandidat berdasarkan id_kandidat, bisa dari database atau hardcode sesuai kebutuhan
      var namaKandidat = "Kandidat " + idKandidat;

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