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
            <h3 class="">Permintaan Peminjaman Buku</h3>
          </div>
          @if (session()->has('pesan'))
            <div class="alert alert-success">
              {{ session()->get('pesan') }}
            </div>
          @endif

        </div><!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Tanggal Permintaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($requests as $request)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $request->book_title->title }}</td>
                  <td>{{ $request->status }}</td>
                  <td>{{ $request->created_at }}</td>
                  <td>
                    <a class="btn btn-danger" href="{{ route('book-titles.show', ['book_title' => $request->id]) }}" role="button">Cancel</a>
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
