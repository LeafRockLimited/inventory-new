<?php
namespace App\Services;

use App\Interfaces\ServiceInterface;
use App\Models\Gudang;
use Illuminate\Support\Facades\DB;

class GudangService implements ServiceInterface{

   static public function getGudangProduct(int $GudangId){
        $data = Gudang::
        withCount('product')
        ->where('active',true)
        ->first();
        return $data;
   }

   static public function barangMasuk(array $data){

      dd($data);
   }

}