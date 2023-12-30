<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Voting</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('upload/logo/'); ?><?= $sekolah->logo_sekolah ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/admin/src'); ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="<?= base_url('asset/aos/dist/aos.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/tema/') ?><?= $tema ?>" />
</head>

<body>
<div style="display:flex; align-items:center; justify-content:center; height:100vh; background-image: url('<?= base_url('upload/tema/' . $tema) ?>'); background-size: cover;">
  <div class="container"><br><br><br><br>
    <div class="container-fluid">
      <div class="card" data-aos="fade-right">
        <div class="card-body d-flex align-items-center">
          <img src="<?= base_url('asset/'); ?>vote.gif" alt="Your Image" width="100" height="100" class="mr-4" data-aos="fade-right" data-aos-delay="300">
          <div class="m-4">
            <h5 class="card-title fw-semibold mb-2" data-aos="fade-right" data-aos-delay="350">Selamat Datang di E-Voting PILKETOS <?= $sekolah->judul_sekolah; ?></h5>
            <p class="card-text mb-0" data-aos="fade-right" data-aos-delay="400">
              Pilih salah satu kandidat dibawah ini untuk membuerikan suaramu !
            </p>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 mb-3">
                <div class="row">
                  <?php foreach ($kandidat as $kandidat) { ?>
                    <div class="col-md-4 mb-4">
                      <div class="card" data-aos="fade-right" data-aos-delay="500">
                        <img src="<?= base_url('upload/kandidat/') . $kandidat['foto_kandidat']; ?>" class="card-img-top" alt="<?= $kandidat['nama_kandidat']; ?>" height="400" width="350">
                        <div class="card-body">
                          <div class="text-center">
                            <h5 class="card-title"><?= $kandidat['nama_kandidat']; ?></h5>
                            <a href="<?= base_url('auth/visi_misi/' . $kandidat['id_kandidat']); ?>" class="btn btn-info m-1">Visi & Misi</a>
                            <a href="<?= base_url('auth/pilih_kandidat/' . rawurlencode($kandidat['id_kandidat'])); ?>" class="btn btn-success m-1" onclick="return confirm('Apakah anda benar-benar ingin memilih kandidat ini ?')" role="button">Pilih</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
				function voteConfirm(event){
					Swal.fire({
						title: 'Vote Confirmation!',
						text: 'Apakah kamu benar-benar ingin memilih kandidat ini?',
						icon: 'warning',
						showCancelButton: true,
						cancelButtonText: 'No',
						confirmButtonText: 'Yes Vote',
						confirmButtonColor: 'red'
					}).then(dialog => {
						if(dialog.isConfirmed){
							window.location.assign(event.dataset.deleteUrl);
						}
					});
				}
			</script>
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
