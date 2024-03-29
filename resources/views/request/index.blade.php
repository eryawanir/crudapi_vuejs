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
            <h3 class="">Daftar Permintaan Peminjaman Buku</h3>
          </div>

        </div><!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nama</th>
                <th>Buku yang akan dipinjam</th>
                <th>Waktu Permintaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($requests as $request)
                <tr class="align-middle">
                  <td>{{ $requests->firstItem() + $loop->index }}</td>
                  <td>{{ $request->user->name }}</td>
                  <td>{{ $request->book_title->title }}</td>
                  <td>{{ $request->waktu() }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('requests.process', ['request' => $request->id]) }}" role="button">Proses</a>
                  </td>
                </tr>
              @empty
              @endforelse

            </tbody>
          </table>
        </div><!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-end">
            {{ $requests->withQueryString()->links() }}
          </ul>
        </div>
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!--end::Row-->
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
