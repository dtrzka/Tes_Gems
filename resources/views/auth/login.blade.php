<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Login
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

<body class="">
  <style>
    body {
      background-color: darkolivegreen;
    }
 </style>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto">
              <div class="card ">
                <div class="card-header">
                    <h4 class="font-weight-bolder">Sign In</h4>
                    <p class="mb-0">Enter your NIP and password to sign In</p>
                    @if (session('success'))
                        <div class="alert alert-success mt-2 mb-0">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mt-2 mb-0">
                            <span>{{ session('error') }}</span>
                        </div>
                    @endif
                </div>
                <div class="card-body ">
                  <form action="{{ route('login') }}" method="post" role="form">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                        <input id="nip" name="nip" type="number" class="form-control" placeholder="nip" required autocomplete="nip" autofocus style="box-shadow: 0 0 0 1px darkolivegreen;">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password" style="box-shadow: 0 0 0 1px darkolivegreen;">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="text-center">
                        <a href="/index"><button type="submit" class="btn btn-lg bg-gradient-light btn-lg w-100 mt-4 mb-0">Sign In</button></a>
                    </div>
                </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>
