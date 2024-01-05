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

<body class="register-page bg-body-secondary">
  <div class="register-box">
    <div class="card card-outline card-primary">

      <div class="card-header">
        <a href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
          <h2 class="mb-0">Perpustakaan Digital</h2>
        </a>
      </div>

      <div class="card-body register-card-body">
        <p class="register-box-msg">Pendaftaran anggota baru</p>

        {{-- FORM --}}
        <form action="{{ route('register') }}" method="post">
          @csrf

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="registerFullName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="">
              <label for="registerFullName">Nama Lengkap</label>
              @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-person"></span></div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="registerEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="">
              <label for="registerEmail">Email</label>
              @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <select class="form-select  @error('role') is-invalid @enderror" name="role" id="role">
                <option selected>Pilih salah satu</option>
                <option value="anggota">Anggota</option>
                <option value="petugas">Petugas</option>
              </select>
              <label for="role">Daftar Sebagai</label>
              @error('role')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-person"></span></div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="registerPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="">
              <label for="registerPassword">Password</label>
              @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>

          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="confirm-password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="">
              <label for="confirm-password">Konfirmasi Password</label>
              @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>


          <div class="row">
            <div class="col d-flex justify-content-center my-3 ">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </div>

        </form>
        {{-- END - FORM --}}

        <p class="mb-0">Sudah jadi anggota? Silahkan
          <a href="{{ route('login') }}" class="link-primary text-center">disini</a>
        </p>

      </div>
    </div>
  </div>

  @include('layouts.script-adminlte')
</body>

</html>
