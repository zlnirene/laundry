<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transactions_item';
    protected $fillable = [
        'transaction_id', 
        'item_id',
        'quantity',
        'price',
        'total'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
