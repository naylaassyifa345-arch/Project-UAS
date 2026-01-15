<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Transaction;


class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'menu_id',
        'qty',
        'harga',
        'subtotal',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
