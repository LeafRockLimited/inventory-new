<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'product_id',
        'tanggal',
        'stok_masuk',
        'stok_keluar',
        'nominal',
        'bukti_tf',
        'pembeli',
        'pemasok',
        'keterangan',
    ];

    public function product(){
        return $this->belongsTo(product::class,'id','product_id');
    }

    public function rekap(){
        return $this->belongsTo(Transaksi::class,'id','transaksi_id');
    }
}
