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
          </div>
          <div class="row">
            <div class="col">
              <a class="btn btn-primary" href="{{ route('book-titles.create') }}" role="button">+ Tambah Judul Buku</a>
            </div>
          </div>
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
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ $book->publisher }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('book-titles.show', ['book_title' => $book->id]) }}" role="button">Lihat</a>
                  </td>
                </tr>
              @empty
              @endforelse

            </tbody>
          </table>
        </div><!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-end">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!--end::Row-->
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
