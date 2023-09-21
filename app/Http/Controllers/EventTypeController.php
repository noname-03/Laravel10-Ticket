<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventType = EventType::all();
        return view('pages.eventType.index', compact('eventType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.eventType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        EventType::create($request->all());

        return redirect()->route('eventType.index')->with('success', 'Data Berhasil Di Tambahkan.!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $eventType = EventType::find($id);
        return view('pages.eventType.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        EventType::find($id)->update($request->all());

        return redirect()->route('eventType.index')->with('success', 'Transaksi Berhasil Di Perbarui.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        EventType::find($id)->delete();
        return response()->json(['message' => 'Data Berhasil Di Hapus.!']);
    }
}