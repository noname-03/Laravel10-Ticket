<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $event = Event::find($id);
        $dateNow = Carbon::now();
        return view('pages.payment.index', compact('event', 'dateNow'));
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'numberCard' => 'required',
            'expiry' => 'required',
            'cvv' => 'required',
        ]);

        $user = auth()->user();
        $event = Event::find($id);

        $payment = Payment::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'amount' => $event->price,
        ]);

        $balance = Balance::where('user_id', $event->user->id)->first();
        if ($balance == null) {
            Balance::create([
                'user_id' => $event->user->id,
                'amount' => $event->price,
            ]);
        } else {
            $balance->amount = $balance->amount + $event->price;
            // $amount = $bal->amount + $event->price;
            // $balance = Balance::find($event->user->balance->id);
            // $user->amount = $balance->amount + $event->price;
            // $balance->save();
        }


        $qrName = time() . '.' . $payment->id . '.png';
        QrCode::format('png')
            ->size(500)
            ->generate(route('event.create'), public_path('images/qr/' . $qrName));
        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'payment_id' => $payment->id,
            'qr' => $qrName,
            'status' => 'active'
        ]);
        return redirect()->route('ticket.show', $ticket->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}