<?php

namespace App\Http\Controllers;

use App\Models\Detail_transaksi;
use App\Models\Transaksi;
use App\Models\Paket;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $details = DetailTransaksi::all();
        $transaksi = Transaksi::all();
        $paket = Paket::all();
        return view('transaksi.index', compact('details','transaksi','paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $detailTransaksi = DetailTransaksi::find($transaksi->id);
        // $transaksi   = Transaksi::all();
        // $paket   = Paket::all();
        // return view('detail_transaksi.create', compact('detailTransaksi','transaksi','paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $transaksi)
    {
        $request->validate([
            'paket_id'  => 'required',
            'qty'       => 'required'
        ],
        [
            'paket_id.required' => 'Pilih Paket',
            'qty.required'      => 'Isi Qty'
        ]);

        $transaksi =Transaksi::findOrFail($transaksi);

        // mencari paket dangan id yang sesuai
        $paket = Paket::find($request->paket_id);
        if (!$paket) {
            return redirect()->back()->withErrors(['Paket tidak ditemukan']);
        }

        // Mengambil data outlet terkait dari paket
        $outlet = $paket->outlet;

        $detailTransaksi = new Detail_transaksi;
        $detailTransaksi->transaksi_id  = $transaksi;
        $detailTransaksi->paket_id      = $request->paket_id;
        $detailTransaksi->qty           = $request->qty;
        $detailTransaksi->bayar         = $request->bayar;

        $detailTransaksi->save();


        $latesInvoice = Transaksi::orderBy('create_at', 'desc')->pluck('kode_invoice')->first();
        $latesInvoiceNumber = substr($latesInvoice, 3);
        $newInvoiceNumber = $latesInvoiceNumber + 1;
        $newInvoiceId = 'trx' . str_pad($newInvoiceNumber, 3, '0', STR_PAD_LEFT);
    
        // Mengambil nama outlet dari data outlet terkait 
        $auto = $newInvoiceId;
        $detailTransaksi->save();
        
        return redirect()->route('transaksi.proses', compact('transaksi','auto','outlet','transaksiModel'));
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'selesai';
        $transaksi->dibayar = 'dibayar';
        $transaksi->save();

        return redirect()->route('transaksi.proses',$transaksi);
    }


    public function invoice($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('status','selesai')->first();
        
        if (!$transaksi) {
            return view('transaksi.no_invoice');
        }

        $details = DetailsTransaksi::where('transaksi_id', $transaksi->id)->get();

        return view('transaksi.invoice', compact('transaksi'. 'details'));
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_transaksi $detail_transaksi)
    {
        //
    }
}