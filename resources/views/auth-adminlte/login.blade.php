<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.head-adminlte')
  <style>
    a:link {
      text-decoration: none;
    }
  </style>
</head>

<body class="login-page bg-body-secondary">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <a href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
          <h1 class="mb-0"><b>Perpus Digital</b>
          </h1>
        </a>
      </div>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk ke Sistem Perputakaan Digital</p>

        {{-- FORM LOGIN --}}
        <form action="{{ route('login') }}" method="post">
          @csrf

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="loginEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="">
              <label for="loginEmail">Email</label>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="">
              <label for="loginPassword">Password</label>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>

          <div class="row">
            <div class="col d-flex justify-content-center my-3">
              <div class="d-grid gap-2"><button type="submit" class="btn btn-primary">Sign In</button></div>
            </div>
          </div>

        </form>

        <p class="mb-0"> Pendaftaran anggota baru silahkan
          <a href="{{ route('register') }}" class="text-center">
            disini
          </a>
        </p>
      </div><!-- /.login-card-body -->
    </div>
  </div><!-- /.login-box --><!--begin::Third Party Plugin(OverlayScrollbars)-->
  @include('layouts.script-adminlte')
</body>

</html>
