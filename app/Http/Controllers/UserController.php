<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.show', compact('user'));
    }
    public function Role($id)
    {
        $user = User::findOrFail($id);
        if ($user->role == 'promotor') {
            $user->update([
                'role' => 'user'
            ]);
            return redirect()->back()->with('success', 'Akun anda berhasil diubah');
        } else {
            $user->update([
                'role' => 'promotor'
            ]);
        }
        return redirect()->back()->with('success', 'Akun anda berhasil diubah');
    }
}