<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookTitleResource;
use App\Models\BookTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiBookTitleController extends Controller
{
    public function index()
    {
        $books = BookTitle::latest()->paginate(5);
        return new BookTitleResource(true, 'List Data Judul Buku', $books);
    }
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'author'     => 'required',
            'publisher'     => 'required',
            'cover'     => 'required|image|max:2048',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //upload image
        $request->cover->store('public/book_covers');

        //create post
        $book = BookTitle::create([
            'title'     => $request->title,
            'author'   => $request->author,
            'publisher'   => $request->publisher,
            'cover'     => $request->cover->hashName(),
        ]);
        //return response
        return new BookTitleResource(
            true,
            'Data Judul Buku Berhasil Ditambahkan!',
            $book
        );
    }

    public function show($id)
    {
        //find post by ID
        $book = BookTitle::find($id);

        //return single book as a resource
        return new BookTitleResource(true, 'Detail Data Judul Buku!', $book);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'author'     => 'required',
            'publisher'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find book by ID
        $book = BookTitle::find($id);

        //check if image is not empty
        if ($request->hasFile('cover')) {

            //upload cover
            $cover = $request->file('cover');
            $cover->storeAs('public/book_covers', $cover->hashName());

            //delete old image
            Storage::delete('public/book_covers/' . basename($book->cover));

            //update post with new image
            $book->update([
                'image'     => $cover->hashName(),
                'title'     => $request->title,
                'author'   => $request->author,
                'publisher'   => $request->publisher,
            ]);
        } else {

            //update post without image
            $book->update([
                'title'     => $request->title,
                'author'   => $request->author,
                'publisher'   => $request->publisher,
            ]);
        }

        //return response
        return new BookTitleResource(true, 'Data Post Berhasil Diubah!', $book);
    }

    public function destroy($id)
    {

        //find book by ID
        $book = BookTitle::find($id);

        //delete image
        Storage::delete('public/book_covers/' . basename($book->cover));

        //delete book
        $book->delete();

        //return response
        return new BookTitleResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
