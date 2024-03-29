<?php

namespace App\Http\Controllers;

use App\Helpers\RequestStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Models\Request as ModelsRequest;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModelsRequest::with('user', 'book_title')
            ->where('status', '=', 0)->oldest()->paginate(5);
        return view('request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }

    public function process(ModelsRequest $request)
    {


        return view('request.process', compact('request'));
    }

    public function cancel(ModelsRequest $request)
    {
        $request->update(['status' => RequestStatus::Ditolak]);
        return redirect()->route('requests.index');
    }
}
