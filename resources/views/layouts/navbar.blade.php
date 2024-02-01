<nav class="app-header navbar navbar-expand bg-body"><!--begin::Container-->
  <div class="container-fluid"><!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a></li>
    </ul><!--end::Start Navbar Links--><!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto"><!--begin::Navbar Search-->
      <!--begin::Fullscreen Toggle-->
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
        </a>
      </li>
      @guest
        {{-- <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">
            <i class="bi bi-pencil-square"></i>
            <span class="d-md-inline">Daftar</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="d-md-inline"> Masuk</span>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-person-fill"></i>
            <span class="d-md-inline">{{ ucfirst(Auth::user()->role) }} : {{ Auth::user()->name }}</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left me-1"></i>
            <span class="d-md-inline"> Keluar</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      @endguest


    </ul><!--end::End Navbar Links-->
  </div><!--end::Container-->
</nav><!--end::Header--><!--begin::Sidebar-->
