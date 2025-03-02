<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        PT ABC
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tambah Permintaan Surat Perintah Lembur</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="col-lg-8 table align-items-center mb-0">
                  <form method="POST" action="{{ url('/addSPL') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="nama">Nama</label>
                        <div class="ms-md-auto">
                          <div class="input-group input-group-outline">
                            <input type="text" name="nama" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                            <label for="manager">Manager</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                <input type="text" name="manager" class="form-control">
                              </div>
                            </div>
                          </div>
                      <div class="mb-3">
                        <label for="tanggal_lembur">Tanggal Lembur</label>
                        <div class="ms-md-auto">
                          <div class="input-group input-group-outline">
                            <input type="date" name="tanggal_lembur" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="posisi">Posisi</label>
                        <div class="ms-md-auto">
                          <div class="input-group input-group-outline">
                            <input type="text" name="posisi" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                          <label for="jam_mulai">Jam Mulai</label>
                          <div class="ms-md-auto">
                            <div class="input-group input-group-outline">
                              <input type="time" name="jam_mulai" class="form-control">
                            </div>
                          </div>
                          </div>
                          <div class="mb-3">
                            <label for="jam_selesai">Jam Selesai</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                <input type="time" name="jam_selesai" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="durasi">Durasi (jam)</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                <input type="text" name="durasi" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="pekerjaan">Pekerjaan</label>
                            <div class="ms-md-auto">
                              <div class="input-group input-group-outline">
                                <input type="text" name="pekerjaan" class="form-control">
                              </div>
                            </div>
                          </div>
                      <div class="mb-3 px-3">
                        <a href="/index">
                          <button type="submit" class="btn btn-primary">Ajukan Surat</button>
                        </a>
                      </div>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.min.js?v=3.0.2') }}"></script>
</body>

</html>