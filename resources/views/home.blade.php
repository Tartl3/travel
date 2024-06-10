<!DOCTYPE html>
<html lang="en">
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
    .search-box {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }
    .mySlides {
      display: none;
      padding: 80px;
      text-align: center;
    }
    .mySlides img {
      width: 100%;
    }
    .search-box .btn-search {
      width: 100%;
    }
    .search-results {
      margin-top: 30px;
    }
    .search-results .card {
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .search-results .card .card-content {
      padding: 20px;
    }
    .search-results .card .card-action {
      background-color: #f5f5f5;
      padding: 10px 20px;
    }
    .search-results .card .card-action a {
      color: #03A9F4;
      font-weight: bold;
    }
    .search-results .card .card-action a:hover {
      text-decoration: underline;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
    }
    .bus-image {
      display: block;
      margin: 0 auto;
      width: 200px;
    }
    .bus-thumbnail {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      margin: 0 auto;
      display: block;
    }
    .btn-pesan {
      background-color: #03A9F4;
    }
    .btn-pesan:hover {
      background-color: #039BE5;
    }
    .card-title {
      font-size: 20px;
      font-weight: bold;
    }
    .card-details {
      color: #757575;
    }
    .destination-card {
      position: relative;
      border-radius: 10px;
      overflow: hidden;
    }
    .destination-card img {
      width: 50px;
      height: 250px;
    }
    .destination-card .card-content {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background: rgba(0, 0, 0, 0.5);
      color: white;
    }
    .destination-card .card-content h5 {
      margin: 0;
      font-size: 18px;
      font-weight: bold;
    }
    .destination-card .card-content p {
      margin: 5px 0 0;
      font-size: 14px;
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
    <div class="row">
      <div class="col s12">
        <div class="search-box">
          <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="row">
              <div class="input-field col s12 m4">
                <input type="text" id="asl" name="asal" class="autocomplete">
                <label for="from">Asal</label>
              </div>
              <div class="input-field col s12 m4">
                <input type="text" id="tujuan" name="tujuan" class="autocomplete">
                <label for="to">Tujuan</label>
              </div>
              <div class="input-field col s12 m2">
                <input type="text" id="tgl" name="date" class="datepicker">
                <label for="date">Keberangkatan</label>
              </div>
              <div class="input-field col s12 m2">
                <input type="text" id="passengers" name="passengers" value="1">
                <label for="passengers">Penumpang</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <label>
                  <input type="checkbox" id="return-checkbox" />
                  <span>Tambahkan jadwal kepulangan</span>
                </label>
              </div>
            </div>
            <div class="row" id="return-date-row" style="display: none;">
              <div class="input-field col s12 m4">
                <input type="text" id="return-date" name="return_date" class="datepicker">
                <label for="return-date">Kepulangan</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <button class="btn waves-effect waves-light blue btn-search" type="submit">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var returnCheckbox = document.getElementById('return-checkbox');
    var returnDateRow = document.getElementById('return-date-row');

    returnCheckbox.addEventListener('change', function() {
      if (returnCheckbox.checked) {
        returnDateRow.style.display = 'block';
      } else {
        returnDateRow.style.display = 'none';
      }
    });
  });
</script>

    

    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="img/bus1.png" alt="Gambar 1">
      </div>
      <div class="mySlides fade">
        <img src="img/bus2.png" alt="Gambar 2">
      </div>
      <div class="mySlides fade">
        <img src="img/bus3.png" alt="Gambar 3">
      </div>
    </div>

    <h4>Beberapa Tempat Rekomdendasi Dari Kami</h4>
    <div class="row">
      <div class="col s12 m4">
        <div class="card destination-card">
          <div class="card-image">
            <img src="img/aceh.jpeg" alt="Aceh">
          </div>
          <div class="card-content">
            <h5>Aceh</h5>
            <p>Terfavorit</p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card destination-card">
          <div class="card-image">
            <img src="img\medan1.jpeg" alt="Medan">
          </div>
          <div class="card-content">
            <h5>Medan</h5>
            <p>Paling Banyak di Kunjungi</p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card destination-card">
          <div class="card-image">
            <img src="img/padang.jpeg" alt="padang">
          </div>
          <div class="card-content">
            <h5>Padang</h5>
            <p>Ternyaman</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.autocomplete');
      var instances = M.Autocomplete.init(elems, {
        data: {
          "Padang": null,
          "Medan": null,
          "Aceh": null,
          "Jakarta": null,
          "Bandung": null,
          "Surabaya": null,
          "Yogyakarta": null
        }
      });

      var datepickers = document.querySelectorAll('.datepicker');
      var instances = M.Datepicker.init(datepickers, {
        format: 'yyyy-mm-dd'
      });

      var passengersInput = document.getElementById('passengers');
      passengersInput.addEventListener('input', function() {
        if (this.value < 1) {
          this.value = 1;
        }
      });
    });
  </script>
  <script>
    var slideIndex = 0;
    showSlides();
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }
  </script>
</body>
</html>
