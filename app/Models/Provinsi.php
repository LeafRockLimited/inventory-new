<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $fillable = ['negara_id','name'];

    public function negara(){
        return $this->belongsTo(Negara::class,'id','negara_id');
    }

    public function kota(){
        return $this->hasMany(Kota::class,'provinsi_id','id');
    }
}
