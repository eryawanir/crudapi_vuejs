<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"><!--begin::Sidebar Brand-->

  <!--Brand Link-->
  <div class="sidebar-brand">
    <a href="../index.html" class="brand-link me-2 ">
      <span class="brand-text fw-light">
        <i class="bi bi-book-fill me-1 "></i>
        Perpustakaan Digital
      </span>
    </a>
  </div>

  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2"><!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="true">
        @if (auth()->user()?->role == 'anggota' or !auth()->check())
          <li class="nav-item mb-3">
            <a href="{{ route('book-titles.index') }}" class="nav-link {{ request()->is('book-titles') ? 'active' : '' }} ">
              <i class="nav-icon bi bi-bookshelf"></i>
              <p>Perpustakaan</p>
            </a>
          </li>
        @endif

        @guest
        @else
          @if (auth()->user()->role == 'petugas')
            <li class="nav-header">KELOLA DATA</li>
            <li class="nav-item">
              <a href="{{ route('book-titles.index') }}" class="nav-link {{ request()->routeIs('book-titles.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-book"></i>
                <p>
                  Judul Buku
                </p>
              </a>
            </li>
            <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"><i class="nav-icon bi bi-database"></i>
                <p>
                  Stok Buku
                </p>
              </a>
            </li>
          @endif
          @if (auth()->user()->role == 'anggota')
            <li class="nav-header">PEMINJAMAN</li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-book"></i>
                <p>
                  Buku
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-list"></i>
                    <p>Daftar</p>
                  </a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-file-earmark-plus"></i>
                    <p>Pendaftaran</p>
                  </a></li>
              </ul>
            </li>
          @endif
        @endguest
      </ul><!--end::Sidebar Menu-->
    </nav>
  </div><!--end::Sidebar Wrapper-->
</aside><!--end::Sidebar--><!--begin::App Main-->
