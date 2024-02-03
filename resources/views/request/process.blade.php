@extends('layouts.master')

@section('head')
  @include('layouts.head-adminlte', [
      'tab_title' => 'Permintaan Buku',
  ])
  {{-- Bisa disisipkan tag <link> --}}
@endsection

@section('header')
  @include('layouts.navbar')
  @include('layouts.sidebar')
@endsection

@section('page_title', 'Permintaan Buku')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card card-secondary card-outline mb-4">
        <div class="card-header">
          <div class="card-title"><b>Permintaan Peminjaman Buku</b></div>
        </div>

        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <td>Nama Pemohon : {{ $request->user->name }}</td>
              </tr>
              <tr>
                <td>Tanggal Permohonan : {{ $request->created_at }}</td>
              </tr>
              <tr>
                <td>Judul Buku : {{ $request->book_title->title }}</td>
              </tr>
            </tbody>
          </table>
          <figure class="figure mt-2 ">
            <img width="200" src="{{ $request->book_title->cover }}" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">{{ $request->book_title->title }} by {{ $request->book_title->author }}</figcaption>
          </figure>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary card-outline mb-3">
        <div class="card-header">
          <div class="card-title text-primary fw-bold">Form Pemberian Peminjaman Buku</div>
        </div>
        <form method="post" action="{{ route('peminjamans.store') }}">
          @csrf
          <div class="card-body">
            <label class="form-label">Jumlah Buku Tersedia : {{ $request->book_title->jumlah() }}</label>
            <div class="mb-1">
              <input type="hidden" name="user_id" value="{{ $request->user_id }}">
              <input type="hidden" name="request_id" value="{{ $request->user_id }}">
              <select name="book_id" class="form-select" aria-label="Default select example">
                <option disabled selected>Pilih Kode buku</option>
                @foreach ($request->book_title->books as $book)
                  <option value="{{ $book->id }}">{{ $book->code }}</option>
                @endforeach
              </select>
              <div id="emailHelp" class="form-text">
                Silahkan siapkan buku sesuai judulnya, lalu samakan kode buku pada isian ini
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Beri Pinjaman</button>
          </div>
        </form>
      </div>
      <div class="card card-danger card-outline mb-4">
        <div class="card-header">
          <div class="card-title text-danger fw-bold">Form Pembatalan Peminjaman Buku</div>
        </div>
        <form method="post" action="{{ route('requests.cancel', ['request' => $request->id]) }}">
          @csrf
          <div class="card-body">
            <label class="form-label">Silahkan klik tombol dibawah bila ingin menolak permintaan peminjaman buku</label>
            <div class="mb-1">
              <input type="hidden" name="user_id" value="{{ $request->user_id }}">
              <input type="hidden" name="request_id" value="{{ $request->user_id }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-danger">Tolak Pinjaman</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
