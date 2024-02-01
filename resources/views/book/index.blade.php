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
            <h3 class="">Daftar Buku</h3>
          </div>
          @can('create', App\Models\BookTitle::class)
            <div class="row d-flex justify-content-start">
              <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('books.choose-title') }}" role="button">+ Tambah Stok Buku</a>
              </div>
              <div class="col-9 m-0 ">
                <form class="form-inline" action="{{ route('books.index') }}" method="GET">
                  <div class="input-group">
                    <label class="col-form-label me-2 ">Pencarian :</label>
                    <select name="column" class="form-select" aria-label="Default select example">
                      <option value="title">Judul</option>
                      <option value="code" @if ($data['column'] == 'code') selected @endif>Kode buku</option>
                    </select>
                    <select name="status" class="form-select" aria-label="Default select example">
                      <option value="tersedia">Status Tersedia</option>
                      <option value="dipinjam" @if ($data['status'] == 'dipinjam') selected @endif>Dipinjam</option>
                    </select>
                    <input type="text" class="form-control w-25 " name="term" placeholder="Cari..." value="{{ $data['keyword'] ?? $data['keyword'] }}" aria-label="Recipient's username" aria-describedby="button-addon2">
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
          @endcan
        </div><!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Judul</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($books as $book)
                <tr class="align-middle">
                  <td>{{ $books->firstItem() + $loop->index }}</td>
                  <td>{{ $book->book_title?->title ?? 'Data tidak tersedia' }}</td>
                  <td>{{ $book->code }}</td>
                  <td>{{ $book->status }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('books.show', ['book' => $book->id]) }}" role="button">Lihat</a>
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
