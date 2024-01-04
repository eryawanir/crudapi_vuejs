{{-- HTML ini digunakan sebagai template utama untuk pembuatan Page --}}

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  {{-- Tempat menyisipkan isi tag <head> --}}
  @yield('head')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary" data-bs-theme="light">
  <div class="app-wrapper">

    {{-- Tempat menyisipkan Navbar atau Sidebar --}}
    @yield('header')

    <main class="app-main">

      {{-- Content Header (judul halaman) --}}
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              {{-- Sisipkan Judul Halaman --}}
              <h3 class="mb-0">@yield('page-title')</h3>
            </div>
          </div>
        </div>
      </div>

      {{-- Konten Utama --}}
      <div class="app-content">
        <div class="container-fluid">
          {{-- Sisipkan Konten Halaman --}}
          @yield('content')
        </div>
      </div>

    </main>

    {{-- Tempat Menyisipkan Footer --}}
    @yield('footer')
  </div>

  {{-- Tempat Menyisipkan Footer --}}
  @yield('script')
</body>

</html>
