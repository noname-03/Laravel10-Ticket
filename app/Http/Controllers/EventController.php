<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $eventTypes = EventType::all();
        $query = Event::query();

        // Filter by event type
        if ($request->has('type') && $request->type != 'all') {
            $query->where('event_type_id', $request->type);
        }

        // Filter by date
        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        // Fetch events based on user role
        if (auth()->user()->role == 'user') {
            $events = $query->get();
        } else {
            $events = $query->where('user_id', auth()->user()->id)->get();
        }

        return view('pages.event.index', compact('events', 'eventTypes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventTypes = EventType::all();
        return view('pages.event.create', compact('eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_type_id' => 'required|exists:event_types,id',
            'date' => 'required',
            'description' => 'required',
        ]);

        $request['user_id'] = auth()->user()->id;
        Event::create($request->all());

        return redirect()->route('event.index')->with('success', 'Data Berhasil Di Tambahkan.!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);
        $event->is_expired = $event->date >= now()->format('Y-m-d');
        return view('pages.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $eventTypes = EventType::all();
        return view('pages.event.edit', compact('event', 'eventTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'event_type_id' => 'required|exists:event_types,id',
            'date' => 'required',
            'description' => 'required',
        ]);

        $request['user_id'] = auth()->user()->id;
        Event::find($id)->update($request->all());

        return redirect()->route('event.index')->with('success', 'Data Berhasil Di Perbarui.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return response()->json(['message' => 'Data Berhasil Di Hapus.!']);

    }
}