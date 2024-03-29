<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable = ['provinsi_id','name'];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class,'id','provinsi_id');
    }

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class,'kota_id','id');
    }
}
