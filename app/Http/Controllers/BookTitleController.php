<?php

namespace App\Http\Controllers;

use App\Models\BookTitle;
use App\Http\Requests\StoreBookTitleRequest;
use App\Http\Requests\UpdateBookTitleRequest;
use Illuminate\Support\Facades\Storage;

class BookTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = BookTitle::all();
        return view('book-title.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookTitleRequest $request)
    {
        $input = $request->validated();
        $request->cover->store('public/book_covers');
        $input['cover'] = $request->cover->hashName();
        BookTitle::create($input);
        session()->flash(
            'pesan',
            'Tambah judul buku' . $request->title . ' berhasil'
        );

        return redirect()->route('book-titles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookTitle $bookTitle)
    {
        $book = $bookTitle;
        return view('book-title.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookTitle $bookTitle)
    {
        $book = $bookTitle;
        return view('book-title.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTitleRequest $request, BookTitle $bookTitle)
    {
        $input = $request->validated();
        if ($request->has('cover')) {
            Storage::delete('public/book_covers/' . $request->oldCover);
            $request->cover->store('public/book_covers');
            $input['cover'] = $request->cover->hashName();
        }
        BookTitle::where('id', $bookTitle->id)->update($input);
        return redirect()->route('book-titles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTitle $bookTitle)
    {
        Storage::delete('public/book_covers/' . $bookTitle->cover);
        $bookTitle->delete();
        return redirect()->route('book-titles.index')
            ->with('pesan', "Hapus data $bookTitle->nama berhasil");
    }
}
