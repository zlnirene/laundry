<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'name',
        'price',
        'unit',
        'image'
    ];

    public function transactions_item()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
