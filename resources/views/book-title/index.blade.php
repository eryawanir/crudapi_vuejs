@extends('layouts.master')

@section('head')
  @include('layouts.head-adminlte', [
      'tab_title' => 'Example',
  ])
  {{-- Bisa disisipkan tag <link> --}}
@endsection

@section('header')
  @include('layouts.navbar')
  @include('layouts.sidebar')
@endsection

@section('page_title', 'Example')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <h3 class="">Daftar Judul Buku</h3>
            @anggota
              <h6>Silahkan pilih judul buku yang ingin dipinjam</h6>
            @endanggota
          </div>
          <div class="row d-flex justify-content-start">
            @can('create', App\Models\BookTitle::class)
              <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('book-titles.create') }}" role="button">+ Tambah Judul Buku</a>
              </div>
            @endcan
            <div class="col-4 m-0 ">
              <form class="form-inline" action="{{ route('book-titles.index') }}" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" name="term" placeholder="Cari Judul.." value="{{ $keyword ?? $keyword }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
              </form>
            </div>

          </div>
          @if (session()->has('pesan'))
            <div class="alert alert-success m-1 ">
              {{ session()->get('pesan') }}
            </div>
          @endif
        </div><!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($books as $book)
                <tr class="align-middle">
                  <td>{{ $books->firstItem() + $loop->index }}</td>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ $book->publisher }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('book-titles.show', ['book_title' => $book->id]) }}" role="button">
                      @anggota
                        Pilih
                      @else
                        Lihat
                      @endanggota
                    </a>
                  </td>
                </tr>
              @empty
              @endforelse

            </tbody>
          </table>
        </div><!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-end">
            {{ $books->withQueryString()->links() }}
          </ul>
        </div>
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!--end::Row-->
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
