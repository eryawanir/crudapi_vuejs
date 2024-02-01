<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\BookTitle;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'keyword' => request('term'),
            'column' => request('column'),
            'status' => request('status') ?? 'tersedia'
        ];

        $query = Book::with('book_title')->where('status', '=', $data['status']);

        if ($data['column'] == 'code') {
            $query->where('code', 'Like', '%' . $data['keyword'] . '%');
        }

        if ($data['column'] == 'title') {
            $query->WhereHas('book_title', function ($q) use ($data) {
                $q->where('title', 'Like', '%' . $data['keyword'] . '%');
            });
        }
        $books = $query->latest()->paginate(5);

        return view('book.index', compact('books', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BookTitle $bookTitle)
    {
        return view('book.create')->with('book', $bookTitle);
    }

    public function choose_title()
    {
        $query = BookTitle::with('books');
        if ($keyword = request('term')) {
            $query->where('title', 'Like', '%' . $keyword . '%');
        }
        $books = $query->latest()->paginate(5);
        return view('book.choose_title', compact('books', 'keyword'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $input = $request->validated();
        for ($i = 0; $i < $input['amount']; $i++) {
            $book = Book::create($input);
            // book_title_id - book_id
            $book_code = str_pad($input['book_title_id'], 4, '0', STR_PAD_LEFT)
                . '-' . str_pad($book->id, 4, '0', STR_PAD_LEFT);
            $book->code = $book_code;
            $book->status = 'tersedia';
            $book->save();
        }
        session()->flash(
            'pesan',
            "Tambah {$input['amount']} stok buku "
                . BookTitle::find($input['book_title_id'])->title .
                ' berhasil'
        );
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
