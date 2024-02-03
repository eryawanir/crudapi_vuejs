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
            <h3 class="">Daftar Peminjaman Buku</h3>
          </div>

        </div><!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nama</th>
                <th>Buku yang dipinjam</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($peminjamans as $peminjaman)
                <tr class="align-middle">
                  <td>{{ $peminjamans->firstItem() + $loop->index }}</td>
                  <td>{{ $peminjaman->user->name }}</td>
                  <td>{{ $peminjaman->book->book_title->title }}</td>
                  <td>{{ $peminjaman->status }}</td>
                  <td>
                    @switch($peminjaman->getRawOriginal('status'))
                      @case(0)
                        <a class="btn btn-primary" href="{{ route('peminjamans.ambil', ['peminjaman' => $peminjaman->id]) }}" role="button">Sudah Diambil</a>
                      @break

                      @case(1)
                        <a class="btn btn-success" href="{{ route('peminjamans.selesai', ['peminjaman' => $peminjaman->id, 'buku' => $peminjaman->book_id]) }}" role="button">Sudah Dikembalikan</a>
                      @break

                      @default
                    @endswitch
                  </td>
                </tr>
                @empty
                @endforelse

              </tbody>
            </table>
          </div><!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
              {{ $peminjamans->withQueryString()->links() }}
            </ul>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!--end::Row-->
  @endsection


  @section('script')
    @include('layouts.script-adminlte')
  @endsection
