<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'reg',
        'barcode_path',
        'keterangan',
        'label_id'
    ];

    public function sku(){
        return $this->hasOne(Sku::class,'product_id','id');
    }
}
