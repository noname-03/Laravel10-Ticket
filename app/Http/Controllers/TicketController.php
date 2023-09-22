<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->where('status', 'active')->get();
        return view('pages.ticket.index', compact('tickets'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('pages.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('pages.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->update([
            'status' => 'inactive'
        ]);
        $balance = Balance::where('user_id', $ticket->payment->event->user_id)->first();
        $balance->update([
            'amount' => $balance->amount - $ticket->payment->amount
        ]);
        $user = auth()->user();
        if ($user->balance == null) {
            Balance::create([
                'user_id' => $user->id,
                'amount' => $ticket->payment->amount
            ]);
        } else {
            $user->balance->update([
                'amount' => $user->balance->amount + $ticket->payment->amount
            ]);
        }
        return response()->json(['message' => 'Anda Telah Membatalakan Tiket Ini.!']);
    }
}