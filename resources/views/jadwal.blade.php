<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informasi Tiket</title>
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
    }
    .card .card-content {
      padding: 20px;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
      <h1>Informasi Tiket</h1>
      <p>Hubungi kami: 123-456-789 | Email: info@traveloka.com</p>
    </div>
  </header>

  <div class="container">
    <div class="card">
      <div class="card-content">
        <span class="card-title">ID Pemesanan: {{ $travel_info->kode_perjalanan }}</span>
        <p>Rute:{{$travel_info->asal}} - {{ $travel_info->tujuan }}</p>
        <p>Tanggal Keberangkatan: 2024-05-10</p>
        <p>Nama Penumpang: {{ $info_customer->name }}</p>
        <p>Email: {{ $info_customer->email }}</p>
        <p>Nomor Telepon: {{ $info_customer->number }}</p>
      </div>
    </div>
  </div>
</body>
</html>
