<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_requests = ModelsRequest::where('user_id', Auth::user()->id)
            ->with('book_title')->latest()->get();
        return view('user-request.index')->with('requests', $user_requests);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'book_title_id' => 'required',
            'status' => 'required',

        ]);
        ModelsRequest::create($validated);
        session()->flash(
            'pesan',
            'Buku yang anda ingin pinjam, akan segera diproses. Mohon tunggu max 24jam'
        );
        return redirect()->route('myrequests.index');
    }
}
