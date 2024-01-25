<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_sku',
        'product_id',
        'harga_beli',
        'harga_jual',
        'masuk',
        'keluar',
        'penyesuaian',
        'total',
        'minimum_stock',
        'maximum_stock'
    ];

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
}
