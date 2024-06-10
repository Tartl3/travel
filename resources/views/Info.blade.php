<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>yuchan Style</title>
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
      background-image: url('img/ppp.jpeg');
      padding: 20px 0;
      color: #fff;
      text-align: center;
      background-size: cover;
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
    .card .card-action {
      background-color: #f5f5f5;
      padding: 10px 20px;
    }
    .card .card-action a {
      color: #03A9F4;
      font-weight: bold;
    }
    .card .card-action a:hover {
      text-decoration: underline;
    }
    .btn-back {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .detail-container {
      background-color: #03A9F4;
      color: #fff;
      padding: 20px;
      border-radius: 10px;
    }
    .detail-container .detail-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .detail-container p {
      margin: 5px 0;
    }
    .departure-container {
      display: flex;
      justify-content: space-between;
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .departure-item {
      flex: 1;
      text-align: center;
    }
    .departure-item h2 {
      font-size: 1.5rem;
      margin-bottom: 0.25rem;
    }
    .departure-item p {
      font-size: 0.875rem;
      margin: 0;
    }
    .departure-item:last-child {
      margin-left: 1rem;
    }
    .departure-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;

    }
    .departure-button {
      background-color: #03A9F4;
      border: none;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 0.875rem;
      margin: 0;
      cursor: pointer;
      border-radius: 5px;
    }
    .departure-partner {
      font-size: 0.875rem;
      margin-bottom: 0.5rem;
      color: #757575;
    }
    .departure-button:hover {
      background-color: #039BE5;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
        <h1>Joomblang Travel</h1>
        <p>Kontak: 123-456-789 | Email: info@tramblang.com</p>
    </div>
  </header>
  
  <div class="container">
    <div class="detail-container">
      <div class="detail-title">Detail Pesanan</div>
      <p>Asal: {{ $detail->input('asal') }}</p>
      <p>Tujuan: {{ $detail->input('tujuan') }}</p>
      <p>Tanggal: {{ date('d-m-Y', strtotime($detail->input('date'))) }}</p>
      <p>Penumpang: {{ $detail->input('passengers') }}</p>
    </div>

    @foreach ($travelokos as $result)
    <div class="card">
      <div class="card-content">
        <p class="departure-partner">{{ $result->kendaraan }}</p>
        <span class="card-title">{{ $result->asal }} - {{ $result->tujuan }}</span>
        <div class="departure-container">
          <div class="departure-item">
            <h2>Loket</h2>
            <p>{{ $result->loket }}</p>
          </div>
          <div class="departure-item">
            <h2>Jadwal</h2>
            <p>{{ date('H:i', strtotime($result->date)) }} - {{ $result->waktu }}</p>
          </div>
          <div class="departure-item">
            <h2>Harga</h2>
            <p>Rp.{{ number_format($result->harga, 0, ',', '.') }}/Orang</p>
          </div>
        </div>
        <div class="departure-actions">
         
          <button class="departure-button collapsible-trigger">DETAIL</button>
          <a href="{{ route('travel.show', $result->kode_perjalanan) }}">
            <button class="departure-button">PILIH</button>
          </a>
        </div>
      </div>
      <div class="collapsible-body card-content" style="display:none;">
        <h5>Informasi Tambahan</h5>
        <p><strong>Nama Kendaraan:</strong> {{ $result->kendaraan }}</p>
        <p><strong>Asal:</strong> {{ $result->asal }}</p>
        <p><strong>Tujuan:</strong> {{ $result->tujuan }}</p>
        <p><strong>Kode Perjalanan:</strong> {{ $result->kode_perjalanan }}</p>
        <p><strong>Jadwal:</strong> {{ date('d-m-Y', strtotime($result->date)) }} {{ date('H:i', strtotime($result->date)) }} - {{ $result->waktu }}</p>
        <p><strong>Harga:</strong> Rp.{{ number_format($result->harga, 0, ',', '.') }}/Orang</p>
      </div>
    </div>
    @endforeach

    <div class="row">
      <div class="col s12">
        <a href="#" class="btn btn-back blue">Kembali</a>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var triggers = document.querySelectorAll('.collapsible-trigger');
      triggers.forEach(function(trigger) {
        trigger.addEventListener('click', function() {
          var collapsibleBody = this.parentElement.parentElement.nextElementSibling;
          if (collapsibleBody.style.display === 'none' || collapsibleBody.style.display === '') {
            collapsibleBody.style.display = 'block';
          } else {
            collapsibleBody.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>
