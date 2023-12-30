<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Siswa</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/lg.png'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body>
<div class="main">
    <?php $this->load->view('admin/_partials/side_nav.php') ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Tambah Kandidat</h1>
                <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Kandidat/tambah'); ?>">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis_kandidat" placeholder="Masukkan NIS" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama_kandidat" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas" name="kelas_kandidat" required>
                            <?php foreach ($daftar_kelas as $kelas) { ?>
                                <option value="<?= $kelas->Nama_kelas; ?>"><?= $kelas->Nama_kelas; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Kandidat</label>
                        <input type="file" class="form-control" id="nama" name="foto_kandidat" placeholder="Masukkan Foto Kandidat" required>
                    </div>
                    <div class="mb-3">
                        <label for="visi" class="form-label">Visi & Misi Kandidat</label>
                        <input type="hidden" name="visi_misi">
                        <div id="editor" cols="30" rows="10" placeholder="Masukkan Visi Misi Kandidat"></div>
                        <!-- <input type="text" class="form-control" id="nama" name="visi_misi" placeholder="Masukkan Visi Misi Kandidat" required> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
			<script>
				var quill = new Quill('#editor', {
				theme: 'snow',
				modules: {
				toolbar: [
					[{ header: [1, 2, 3, 4, 5, 6, false] }],
					[{ font: [] }],
					["bold", "italic"],
					["link", "blockquote", "code-block", "image"],
					[{ list: "ordered" }, { list: "bullet" }],
					[{ script: "sub" }, { script: "super" }],
					[{ color: [] }, { background: [] }],
				]
				},
			});
			quill.on('text-change', function (delta, oldDelta, source) {
				document.querySelector("input[name='visi_misi']").value = quill.root.innerHTML;
			});
			</script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/app.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url('asset/admin/src'); ?>/assets/js/dashboard.js"></script>
</body>

</html>
