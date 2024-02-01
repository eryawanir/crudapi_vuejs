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
          <div class="card-title">Buku {{ $book->code }}</div>
        </div>

        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <figure class="figure">
                  <img src="{{ $book->book_title->cover }}" class="figure-img img-fluid rounded" alt="...">
                  <figcaption class="figure-caption">{{ $book->book_title->title }} by {{ $book->book_title->author }}</figcaption>
                </figure>
              </div>
              <div class="col-8">
                <h1>{{ $book->title }}</h1>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Code : {{ $book->code }}</td>
                    </tr>
                    <tr>
                      <td>Judul : {{ $book->book_title->title }}</td>
                    </tr>
                    <tr>
                      <td>Pengarang : {{ $book->book_title->author }}</td>
                    </tr>
                    <tr>
                      <td>Status : {{ $book->status }}</td>
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

              <form method="POST" action="{{ route('books.destroy', ['book' => $book->id]) }}">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger me-2 " type="submit">Hapus</button>
              </form>

            </div>
            <div class="col d-flex justify-content-end">
              <a class="btn btn-secondary me-2 " href="{{ route('books.index') }}" role="button">Kembali</a>
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
