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

        <li class="nav-item mb-3">
          <a href="#" class="nav-link active ">
            <i class="nav-icon bi bi-bookshelf"></i>
            <p>Perpustakaan</p>
          </a>
        </li>

        @guest
        @else
          <li class="nav-header">KELOLA DATA</li>
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
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-people-fill"></i>
              <p>
                Anggota
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-person-lines-fill"></i>
                  <p>Daftar</p>
                </a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-person-add"></i>
                  <p>Pendaftaran</p>
                </a></li>
            </ul>
          </li>
        @endguest
      </ul><!--end::Sidebar Menu-->
    </nav>
  </div><!--end::Sidebar Wrapper-->
</aside><!--end::Sidebar--><!--begin::App Main-->
