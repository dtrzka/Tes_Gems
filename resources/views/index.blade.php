@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Surat Perintah Lembur
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
        @if (session('success'))
            <div class="alert alert-success mb-2">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mb-2">
                <span>{{ session('error') }}</span>
            </div>
        @endif
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Permintaan Surat Perintah Lembur</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between w-100 mb-3">
              @auth
                @if (auth()->user()->role == 0)
                    <div class="btn-group me-2 mb-0 btn">
                      <a href="{{ url('/addSPL') }}" class="btn btn-primary mb-0 btn text-right">+ Surat Lembur</a>
                    </div>
                @endif
              @endauth
              @auth
                @if (auth()->user()->role == 1)
                  <div class="btn-group me-2 mb-0 btn">
                    <a href="{{ url('download') }}" class="btn btn-primary mb-0 btn text-right">Unduh Laporan</a>
                  </div>
                @endif
              @endauth
            </div>
            <div class="card-body px-0 pb-2 pt-1">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('id', 'ID')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('nama', 'Nama')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('posisi', 'Posisi')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('tanggal_lembur', 'Tanggal Lembur')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('jam_mulai','Jam Mulai')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('jam_selesai','Jam Selesai')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('durasi','Durasi (Jam)')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('pekerjaan','Pekerjaan')</th>
                      @if (auth()->user()->role != 1)
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('manager','Manager')</th>
                      @endif
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@sortablelink('status','Status')</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($spl_req as $key => $spl)
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs text-secondary mb-0">{{ $spl->id }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs text-secondary mb-0">{{ $spl->nama }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs text-secondary mb-0">{{ $spl->posisi }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs text-secondary mb-0">{{ $spl->tanggal_lembur }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <p class="text-xs text-secondary mb-0">{{ $spl->jam_mulai }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <p class="text-xs text-secondary mb-0">{{ $spl->jam_selesai }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <p class="text-xs text-secondary mb-0">{{ $spl->durasi }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <p class="text-xs text-secondary mb-0">{{ $spl->pekerjaan }}</p>
                            </td>
                            @if (auth()->user()->role != 1)
                            <td class="align-middle text-center text-sm">
                              <p class="text-xs text-secondary mb-0">{{ $spl->manager }}</p>
                            </td>
                            @endif
                            <td class="align-middle text-center text-sm">
                                @if ($spl->status == 'Menunggu Persetujuan')
                                    <p class="text-xs text-secondary mb-0">{{ Str::ucfirst($spl->status) }}</p>
                                @elseif($spl->status == 'Disetujui')
                                    <p class="text-xs text-success mb-0">{{ Str::ucfirst($spl->status) }}</p>
                                @else($spl->status == 'Ditolak')
                                    <p class="text-xs text-success mb-0">{{ Str::ucfirst($spl->status) }}</p>
                                @endif
                              </td>
                              <td class="align-middle text-center text-sm">
                                    @if($spl->status == 'Menunggu Persetujuan')
                                        <form action="{{ route('spl.destroy', $spl->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this request?')">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    @elseif($spl->status == 'Disetujui')
                                        <a href="{{ route('spl.print', $spl->id) }}" class="btn btn-sm btn-primary">
                                            <i class="material-icons">print</i> Print
                                        </a>
                                    @endif
                                @if(auth()->user()->role == 1)
                                    @if($spl->status == 'Menunggu Persetujuan')
                                        <form action="{{ route('spl.approve', $spl->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="material-icons">check</i>
                                            </button>
                                        </form>
                                        <form action="{{ route('spl.reject', $spl->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="align-middle text-center text-sm" colspan="7">
                                <p class="text-xs text-secondary mb-0">Tidak ada data</p>
                            </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
                {{  $spl_req->withQueryString()->links() }}
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
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.min.js?v=3.0.2') }}"></script>
</body>

</html>
