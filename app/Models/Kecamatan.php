<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['kota_id','name'];

    public function kota(){
        return $this->belongsTo(Kota::class,'id','kota_id');
    }
}
