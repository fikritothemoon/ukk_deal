<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function view()
    {
        return view('auth.login');
    }

    public function proses(Request $request)
   {
        $user = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($user))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin')
            {
                return redirect()->route('dashboard.admin');
            } else if ($user->role == 'kasir')
            {
                return redirect()->route('dashboard.kasir');  
            } else if ($user->role == 'owner')
            {
                return redirect()->route('dashboard.owner');  
            } else {
                return redirect()->route('login');
            }

        }
        return back()->withErrors([
            'username' => 'The provided creentials do not match our records.',
        ])->onlyInput('username');
   }
   public function logout(Request $request)
   {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect('/login');
   }

}
