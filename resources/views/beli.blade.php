<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joomblang Travel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-image: url('img/laut.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed
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
        <span class="card-title">Detail Keberangkatan</span>
        <p>Dari:{{ $travel->asal }}</p>
        <p>Ke: {{ $travel->tujuan }}</p>
        <p>Tanggal Keberangkatan: {{ $travel->tgl }}</p>
        <p>Penumpang: {{ $passengers }}</p>
      </div>
      <div class="card-action">
        <a href="#">Edit</a>
      </div>
    </div>
    <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <input type="hidden" name="asal" value="{{ $travel->asal }}">
        <input type="hidden" name="tujuan" value="{{ $travel->tujuan }}">
        <input type="hidden" name="tgl" value="{{ $travel->tgl }}">
        <input type="hidden" name="passengers" value="{{ $passengers }}">
        <input type="hidden" name="kode_perjalanan" value="{{ $travel->kode_perjalanan }}">
        <div class="card">
            <div class="card-content">
              <input type="hidden" name="travel_id" value="{{ $travel->travel_id }}">
       
                <span class="card-title">Informasi Penumpang</span>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="name" type="text" class="validate" name="name">
                        <label for="name">Nama</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" type="tel" class="validate" name="phone">
                        <label for="phone">Nomor Telepon</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Pilih Nomor Bangku</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="seatNumber" type="number" class="validate" name="seatNumber">
                        <label for="seatNumber">Nomor Bangku</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <a href="#" class="btn btn-back blue" id="backBtn">Kembali</a>
                <button type="submit" class="btn waves-effect waves-light blue right">Lanjutkan ke Pembayaran</button>
            </div>
        </div>
    </form>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
