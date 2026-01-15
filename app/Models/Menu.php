<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'category_id',
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class);
    }

}
