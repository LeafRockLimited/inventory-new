<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'tahun',
        'bulan',
        'total_stok_masuk',
        'total_stok_keluar',
        'nominal_masuk',
        'nominal_keluar',
        'keterangan',
    ];

    public function product(){
        return $this->belongsTo(product::class,'id','product_id');
    }
}
