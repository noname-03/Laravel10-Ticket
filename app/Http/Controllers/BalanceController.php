<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function increase(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->balance->update([
            'amount' => $user->balance->amount + $request->amount
        ]);
    }
    public function decrease(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'name_bank' => 'required',
            'no_rek' => 'required',
            'amount' => 'required|numeric|min:1',
            // Assuming amount should be numeric and at least 1
        ]);

        $user = User::findOrFail($id);

        if ($user->balance->amount < $request->amount) {
            return redirect()->route('user.show', $user->id)
                ->withInput() // Preserve old input
                ->with('error', 'Saldo tidak cukup');
        } else {
            $user->balance->update([
                'amount' => $user->balance->amount - $request->amount
            ]);

            return redirect()->route('user.show', $user->id)
                ->with('success', 'Saldo berhasil dikurangi');
        }
    }

}