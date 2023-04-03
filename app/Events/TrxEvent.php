<?php

namespace App\Event;

use App\Models\Transaksi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\DB;

class TrxEvent implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    public $transaksi;

    /**
     * create a new event instance.
     * 
     * @param Transaksi $transaksi
     * @return void
     */
    public function __construct(Tansaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Handle the event.
     * 
     * @return void 
     */
    public function handle()
    {
        // ubah kode transaksi menjadi trx{id}
        $this->transaksi->kode_invoice = 'trx' . str_pad($this-transaksi->id, 3, '0', STR_PAD_LEFT);
        $this->transaksi->save();

        // kirim email notifikasi ke admin 
    }
}