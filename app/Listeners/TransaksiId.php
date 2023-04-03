<?php 

namespace App\Listeners;

use App\Models\Transaksi;
use App\Models\TransaksiEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractWithQueue;

class TransaksiId
{
    /**
     * Create the event listeners.
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * 
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        // Generate unique ID for the transaction
        $transaksiId = 'TRANS-' . time() . '-' . rand(100, 999);

        // Assign the generate ID to the transaction
        if ($event instanceof Transaksi) {
            $event->transaksi_id = $transaksiId;
        }
    }
}