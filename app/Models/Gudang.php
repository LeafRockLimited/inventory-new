<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Gudang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'negara_id',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'desa_id',
        'alamat',
        'active',
    ];

    public function product(){
        $query = $this->hasManyThrough(product::class,Sku::class,'product_id','id');
        return $query;

    }
}
