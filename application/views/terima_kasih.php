<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terima Kasih</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
    }

    .thank-you-container {
      text-align: center;
    }

    .thank-you-text {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }

    .thank-you-gif {
      max-width: 100%;
    }
  </style>
</head>

<body>
  <div class="thank-you-container">
    <div class="thank-you-text">Terima Kasih Telah Memilih!</div>
    <img class="thank-you-gif" src="<?= base_url('asset/'); ?>voting.gif" alt="Terima Kasih">
  </div>

  <script>
    setTimeout(function () {
      window.location.href = "http://localhost/e-voting/index.php/auth/login";
    }, 50000); // 10000 milidetik = 10 detik
  </script>
</body>

</html>
