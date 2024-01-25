<?php

namespace App\Services;

use App\Interfaces\SkuServiceInterface;
use App\Models\Sku;
use Exception;
use Ramsey\Uuid\Type\Decimal;

class SkuService implements SkuServiceInterface
{

    static public function create(int $product_id ,array $stok){
       try {
            
            $sku = Sku::firstOrNew(['product_id' =>$product_id]);
            if (isset($stok['harga_beli'])) {
                $sku->harga_beli = $stok['harga_beli'];
            }
            if (isset($stok['harga_jual'])) {
                $sku->harga_jual = $stok['harga_jual'];
            }
            if (isset($stok['masuk'])) {
                $sku->masuk = $sku->masuk + $stok['masuk'];
            }
            if (isset($stok['keluar'])) {
                $sku->keluar = $sku->keluar + $stok['keluar'];
            }
            if (isset($stok['penyesuaian'])) {
                $sku->penyesuaian = $sku->penyesuaian + $stok['penyesuaian'];
            }
            $sku->total = SkuService::hitungSku($sku->masuk,$sku->keluar,$sku->penyesuaian);

            if ($sku->total < 0) {
                throw new Exception("stok barang kosong");
            }

            $sku->save();
            return $sku;
       } catch (\Throwable $th) {
            throw $th;
       }
    }

    static public function update(int $product_id, $harga_beli = null, $harga_jual = null):void{
        try {
            $slug = [
                'harga_beli' => $harga_beli,
                'harga_jual' =>  $harga_jual
            ];

            $slug = array_filter($slug);

            Sku::where('product_id',$product_id)
            ->update($slug);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static private function hitungSku($masuk = 0, $keluar = 0, $penyesuaian = 0){

        return ($masuk - $keluar) + $penyesuaian;
    }
}