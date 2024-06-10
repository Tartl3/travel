<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joomblang Travel - Pembayaran</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-image: url('img/laut.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .header {
      background-color: #03A9F4;
      padding: 20px 0;
      color: #fff;
      text-align: center;
      border-bottom-left-radius: 50px;
      border-bottom-right-radius: 50px;
    }
    .header h1 {
      margin: 0;
      font-size: 24px;
    }
    .header p {
      margin-top: 5px;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
    }
    .card {
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    .card .card-content {
      padding: 20px;
    }
    .btn-back {
      margin-top: 5px;
      margin-bottom: 10px;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
      <h1>Joomblang Travel</h1>
      <p>Hubungi kami: 123-456-789 | Email: info@traveloka.com</p>
    </div>
  </header>

  <div class="container">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Informasi Pembayaran</span>
        <p><strong>Metode Pembayaran:</strong> M-Banking</p>
        <p><strong>Nomor Rekening Tujuan:</strong> 1234567890</p>
        <p><strong>Nominal Pembayaran:</strong> Rp 150.000</p>
        <p><strong>Kode Pembayaran:</strong> 123456</p>
        <p>Silakan transfer jumlah pembayaran ke nomor rekening tujuan di atas. Gunakan kode pembayaran sebagai referensi saat melakukan transfer.</p>
      </div>
    </div>

    <div class="row">
      <div class="col s6">
        <a href="#" class="btn btn-back blue" id="backBtn">Kembali</a>
      </div>
      <div class="col s6">
        <a href="#" class="btn waves-effect waves-light blue right" id="confirmPayment">Konfirmasi Pembayaran</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#backBtn').on('click', function() {
        // Anda dapat menambahkan kode untuk navigasi kembali ke halaman sebelumnya di sini
      });

      $('#confirmPayment').on('click', function() {
        // Anda dapat menambahkan kode untuk mengonfirmasi pembayaran di sini
        // Setelah pembayaran berhasil, Anda dapat melakukan navigasi ke halaman untuk menampilkan tiket
      });
    });
  </script>
</body>
</html>
