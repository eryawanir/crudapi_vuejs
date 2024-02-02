<?php

namespace App\Http\Controllers;

use App\Helpers\StatusPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('book', 'user')->oldest()->paginate(5);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(['book_id' => 'required']);
        $peminjaman = new Peminjaman();
        $peminjaman->user_id = $request->user_id;
        $peminjaman->book_id = $validasi['book_id'];
        $peminjaman->status = StatusPeminjaman::BelumDiambil;
        $peminjaman->save();
    }
}
