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

    <div class="col-md-8 col-xl-8">
      <div class="card card-primary card-outline mb-4">

        <div class="card-header">
          <div class="card-title">Form Tambah Judul Buku</div>
        </div>

        <form action="{{ route('book-titles.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="mb-3">
              <label for="title" class="form-label">Judul Buku</label>
              <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
                <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="author" class="form-label">Pengarang</label>
              <input type="text" id="author" name="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror">
              @error('author')
                <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="publisher" class="form-label">Penerbit</label>
              <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" class="form-control @error('publisher') is-invalid @enderror">
              @error('publisher')
                <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="cover" class="form-label">Gambar Cover Buku</label>
              <input type="file" class="form-control form-control-sm" id="cover" name="cover">
              <div id="coverHelp" class="form-text">
                Gunakan Gambar cover buku yang jelas!
              </div>
              @error('cover')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>


          </div>
          <div class="card-footer d-flex justify-content-end ">
            <a class="btn btn-secondary me-2 " href="{{ route('book-titles.index') }}" role="button">Kembali</a>
            <button type="submit" class="btn btn-primary me-2 ">Submit</button>
          </div>
        </form>
      </div>

    </div>

  </div>
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
