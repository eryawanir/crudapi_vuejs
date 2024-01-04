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
          <div class="card-title">Judul Form</div>
        </div>

        <form action="{{ url('/') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="mb-3">
              <label for="berkas" class="form-label">Gambar Cover Buku</label>
              <input type="file" class="form-control form-control-sm" id="berkas" name="berkas">
              <div id="emailHelp" class="form-text">
                We'll never share your email with anyone else.
              </div>
              @error('berkas')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end ">
            <button type="submit" class="btn btn-primary me-2 ">Submit</button>
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
