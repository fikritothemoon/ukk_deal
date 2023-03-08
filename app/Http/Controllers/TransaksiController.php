<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use App\Models\User;
use App\Models\outlet;
use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksi      =   Transaksi::all();
        $member         =   Member::all();
        $pakets         =   Paket::all()->where('outlet_id', Auth()->user()->outlet_id);
        $outlets        =   outlet::all();
        $users          =   user::all();
        return view('transaksi.index', compact('member', 'pakets', 'transaksi', 'outlets', 'users'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transaksi $transaksi, Request $request)
    {
        //
        $transaksi = new Transaksi;
        $transaksi->outlet_id       = Auth::user()->outlet_id;
        $transaksi->kode_invoice    = '';
        $transaksi->member_id       = '1'; 
        $transaksi->tgl             = Carbon::now()->format('Y-m-d');
        $transaksi->batas_waktu     = Carbon::now()->format('Y-m-d');
        $transaksi->tgl_bayar       = Carbon::now()->format('Y-m-d');
        $transaksi->biaya_tambahan  = 0;
        $transaksi->diskon          = 0;
        $transaksi->pajak           = 0;
        $transaksi->status          = 'baru';
        $transaksi->dibayar         = 'belum_dibayar';
        $transaksi->user_id        = Auth::user()->id;
        $transaksi->save();
        // session(['id_penjualan' => $transaksi->id]);
        // return view('transaksi.create', compact('members', 'pakets'));
        $idTransaksi = $transaksi->id;
        return redirect()->route('transaksi.proses', $transaksi->id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'outlet_id'           => 'required',
            'kode_invoice'        => 'required',
            'member_id'           => 'required',
            'tgl'                 => 'required',
            'batas_waktu'         => 'required',
            'tgl_bayar'           => 'required',
            'biaya_tambahan'      => 'required',
            'diskon'              => 'required',
            'pajak'               => 'required',
            'status'              => 'required',
            'dibayar'             => 'required',
            'user_id'             => 'required',
        ]);
        Transaksi::create([
            'outlet_id'           => $request->outlet_id,
            'kode_invoice'        => $request->kode_invoice,
            'member_id'           => $request->member_id,
            'tgl'                 => $request->tgl,
            'batas_waktu'         => $request->batas_waktu,
            'tgl_bayar'           => $request->tgl_bayar,
            'biaya_tambahan'      => $request->biaya_tambahan,
            'diskon'              => $request->diskon,
            'pajak'               => $request->pajak,
            'status'              => $request->status,
            'dibayar'             => $request->dibayar,
            'user_id'             => $request->user_id,
        ]);
        return redirect('/transaksi');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        $member         = Members::all();
        $outlets        = Outlet::all();
        $user           = User::all();
        $transaksi      = Transaksi::find($transaksi->id);
        return view('transaksi.show', compact('transaksi', 'members', 'outlets', 'user'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi, Paket $paket)
    {
        //
        $transaksi = Transaksi::all();
        $pakets = Paket::all();
        $members = Member::all();
        return view('transaksi.proses', compact('pakets', 'member', 'transaksis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $request->validate([
            'outlet_id'             => 'required',
            'kode_invoice'          => 'required',
            'members_id'            => 'required',
            'tgl'                   => 'required',
            'batas_waktu'           => 'required',
            'tgl_bayar'             => 'required',
            'biaya_tambahan'        => 'required',
            'diskon'                => 'required',
            'pajak'                 => 'required',
            'status'                => 'required',
            'dibayar'               => 'required',
            'user_id'               => 'required',
        ]);
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi-> outlets_id          = $request->outlets_id;
        $transaksi-> kode_invoice        = $request->outlets_id;
        $transaksi-> members_id          = $request->outlets_id;
        $transaksi-> tgl                 = $request->outlets_id;
        $transaksi-> batas_waktu         = $request->outlets_id;
        $transaksi-> tgl_waktu           = $request->outlets_id;
        $transaksi-> biaya_tambahan      = $request->outlets_id;
        $transaksi-> diskon              = $request->outlets_id;
        $transaksi-> pajak               = $request->outlets_id;
        $transaksi-> status              = $request->outlets_id;
        $transaksi-> dibayar             = $request->outlets_id;
        $transaksi-> user_id             = $request->outlets_id;
        $transaksi->update();
        return redirect('/member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi->delete();
        return redirect('/transaksi');
    }
}
