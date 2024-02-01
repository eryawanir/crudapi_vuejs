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

    <div class="col-md-9 col-xl-9">
      <div class="card card-primary card-outline mb-4">

        <div class="card-header">
          <div class="card-title">Judul Buku</div>
        </div>

        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <figure class="figure">
                  <img src="{{ $book->cover }}" class="figure-img img-fluid rounded" alt="...">
                  <figcaption class="figure-caption">{{ $book->title }} by {{ $book->author }}</figcaption>
                </figure>
              </div>
              <div class="col-8">
                <h1>{{ $book->title }}</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Judul : {{ $book->title }}</td>
                    </tr>
                    <tr>
                      <td>Penerbit : {{ $book->publisher }}</td>
                    </tr>
                    <tr>
                      <td>Pengarang : {{ $book->author }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              @can('delete', $book, App\Models\BookTitle::class)
                <form method="POST" action="{{ route('book-titles.destroy', ['book_title' => $book->id]) }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger me-2 " type="submit">Hapus</button>
                </form>
              @endcan
            </div>
            <div class="col d-flex justify-content-end">
              <a class="btn btn-secondary me-2 " href="{{ route('book-titles.index') }}" role="button">Kembali</a>
              @can('update', $book, App\Models\BookTitle::class)
                <a class="btn btn-primary me-2 " href="{{ route('book-titles.edit', ['book_title' => $book->id]) }}" role="button">Edit</a>
              @endcan
              @anggota
                <form id="logout-form" action="{{ route('myrequests.store') }}" method="POST" class="">
                  @csrf
                  <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                  <input type="hidden" value="{{ $book->id }}" name="book_title_id">
                  <input type="hidden" value="0" name="status">
                  <button type="submit" class="btn btn-primary me-2 ">Pinjam Buku Ini</button>
                </form>
              @endanggota
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection


@section('script')
  @include('layouts.script-adminlte')
@endsection
