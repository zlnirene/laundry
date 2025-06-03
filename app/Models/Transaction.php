<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'no_transaction',
        'customer',
        'cashier',
        'date',
        'time'
    ];

    public function transactionsItems()
    {
        return $this->hasMany(TransactionItem::class);
    }

}
