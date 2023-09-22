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
        $user = User::findOrFail($id);
        $user->balance->update([
            'amount' => $user->balance->amount - $request->amount
        ]);
    }
}