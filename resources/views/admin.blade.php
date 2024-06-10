<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Travel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-image: url('img/laut.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .sidebar {
      min-height: 100vh;
      padding-top: 20px;
      background-color: #0056b3;
      position: fixed;
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
    .card {
      margin-bottom: 20px;
    }
    .nav-link.active {
      font-weight: bold;
      color: #ffffff;
    }
    .nav-link.dashboard-text {
      font-weight: bold;
      font-size: 1.2em;
      color: #ffffff;
    }
    .nav-link {
      color: #d1e7ff;
    }
    .nav-link:hover {
      color: #ffffff;
    }
    .section {
      display: none;
    }
    .section.active {
      display: block;
    }
    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .sidebar-toggler {
      display: none;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
      .sidebar {
        position: relative;
        width: 100%;
      }
      .sidebar-toggler {
        display: block;
      }
    }
    .padding-100 {
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active dashboard-text" href="#" data-target="#dashboard">
                <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-target="#vehicles">
                <i class="fas fa-car"></i> Ketersediaan Kendaraan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-target="#orders">
                <i class="fas fa-clipboard-list"></i> Data Pesanan
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
        <!-- Dashboard Section -->
        <div id="dashboard" class="section active pt-3 pb-2 mb-3 border-bottom">
          <h2>Dashboard</h2>
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="card text-white bg-info mb-3 text-center">
                <div class="card-body">
                  <a href="#" class="nav-link text-white" data-target="#vehicles">
                    <i class="fas fa-car fa-3x"></i>
                    <h5 class="card-title">Ketersediaan Kendaraan</h5>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-white bg-secondary mb-3 text-center">
                <div class="card-body">
                  <a href="#" class="nav-link text-white" data-target="#orders">
                    <i class="fas fa-clipboard-list fa-3x"></i>
                    <h5 class="card-title">Data Pesanan</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Vehicles Section -->
        <div id="vehicles" class="section pt-3 pb-2 mb-3 border-bottom padding-100">
          <h2>Ketersediaan Kendaraan</h2>
          <button class="btn btn-success mb-3" onclick="showAddVehicleModal()">Tambah Kendaraan</button>
          <table class="table table-striped table-responsive-md">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kendaraan</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Kode Perjalanan</th>
                <th>Jadwal</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($travels as $index => $travel)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $travel->kendaraan }}</td>
                  <td>{{ $travel->asal }}</td>
                  <td>{{ $travel->tujuan }}</td>
                  <td>{{ $travel->kode_perjalanan }}</td>
                  <td>{{ $travel->waktu }}</td>
                  <td>{{ $travel->harga }}</td>
                  <td>
                      <button class="btn btn-primary btn-sm" onclick="editVehicle({{ $travel->id }})">Edit</button>
                      <button class="btn btn-danger btn-sm" onclick="deleteVehicle({{ $travel->id }})">Hapus</button>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Orders Section -->
        <div id="orders" class="section pt-3 pb-2 mb-3 border-bottom">
          <h2>Data Pesanan</h2>
          <table class="table table-striped table-responsive-md">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Penumpang</th>
                <th>Nama Kendaraan</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>No. Bangku</th>
                <th>Jadwal</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data pesanan akan diisi di sini -->
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Tambah Kendaraan -->
  <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addVehicleModalLabel">Tambah Kendaraan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/travels" method="POST">
            @csrf
            <div class="form-group">
              <label for="vehicleName">Nama Kendaraan</label>
              <input type="text" class="form-control" id="vehicleName" name="kendaraan" placeholder="Masukkan nama kendaraan" required>
            </div>
            <div class="form-group">
              <label for="vehicleFrom">Asal</label>
              <input type="text" class="form-control" id="vehicleFrom" name="asal" placeholder="Masukkan rute kendaraan" required>
            </div>
            <div class="form-group">
              <label for="vehicleTo">Tujuan</label>
              <input type="text" class="form-control" id="vehicleTo" name="tujuan" placeholder="Masukkan rute kendaraan" required>
            </div>
            <div class="form-group">
              <label for="vehicleLocation">Lokasi Loket</label>
              <input type="text" class="form-control" id="vehicleLocation" name="lokasi" placeholder="Masukkan lokasi loket" required>
            </div>
            <div class="form-group">
              <label for="vehicleDate">Tanggal</label>
              <input type="date" class="form-control" id="vehicleDate" name="tgl" required>
            </div>
            <div class="form-group">
              <label for="vehicleSchedule">Jadwal</label>
              <input type="time" class="form-control" id="vehicleSchedule" name="waktu" required>
            </div>
            <div class="form-group">
              <label for="vehiclePrice">Harga</label>
              <input type="number" class="form-control" id="vehiclePrice" name="harga" placeholder="Masukkan harga tiket" required>
            </div>
            <div class="form-group">
              <label for="vehicleStatus">Status</label>
              <input type="text" class="form-control" id="vehicleStatus" name="status" value="active" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const links = document.querySelectorAll('.nav-link');
      const sections = document.querySelectorAll('.section');

      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('data-target'));

          // Remove active class from all links and sections
          links.forEach(link => link.classList.remove('active'));
          sections.forEach(section => section.classList.remove('active'));

          // Add active class to clicked link and target section
          this.classList.add('active');
          target.classList.add('active');
        });
      });
    });

    function showAddVehicleModal() {
      $('#addVehicleModal').modal('show');
    }
  </script>
</body>
</html>
