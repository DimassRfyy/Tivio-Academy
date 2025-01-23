<?php

namespace App\Observers;

use App\Helpers\TransactionHelper;
use App\Models\Transaction;

class TransactionObserver
{
    //

    public function creating($transaction)
    {
        $transaction->booking_trx_id = TransactionHelper::generateUniqueTrxId();
    }

    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        //
    }
}
