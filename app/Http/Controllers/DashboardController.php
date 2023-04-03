<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function kasir()
    {
        $members = Member::all();
        $transaksi = Transaksi::all();
        return view('dashboard.kasir', compact('members','transaksi'));
    }
    
    public function owner()
    {
        return view('dashboard.owner');
    }

}