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
    .btn-back {
      margin-top: 20px;
      margin-bottom: 10px;
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
    <div class="card">
      <div class="card-content">
        <span class="card-title">Edit Pesanan</span>
        <form action="#">
          <div class="row">
            <div class="input-field col s12 m6">
              <input id="from" type="text" class="validate" value="Medan">
              <label for="from">Asal</label>
            </div>
            <div class="input-field col s12 m6">
              <input id="to" type="text" class="validate" value="Aceh">
              <label for="to">Tujuan</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <input type="text" class="datepicker" value="2024-05-10">
              <label for="date">Jadwal</label>
            </div>
            <div class="input-field col s12 m6">
              <select>
                <option value="" disabled selected>Penumpang</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <label>Penumpang</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light blue" type="submit">Update Pesanan</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col s12">
        <a href="#" class="btn btn-back blue">Kembali</a>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var datepickers = document.querySelectorAll('.datepicker');
      var options = {
        format: 'yyyy-mm-dd',
        autoClose: true
      };
      M.Datepicker.init(datepickers, options);

      var selects = document.querySelectorAll('select');
      M.FormSelect.init(selects);
    });
  </script>
</body>
</html>
