<?php

namespace App\Services;

use App\Interfaces\ProductServiceInterface;
use App\Models\product;
use App\Models\ProductLabel;
use App\Models\Sku;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\BarcodeServiceProvider;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class ProductService implements ProductServiceInterface
{
    static public function fetch($param){
        $col = ['id','nama','reg','harga_beli','harga_jual'];
       

        $data = product::join('skus as sku','sku.id','products.id')
        ->when($param['search'],function($sub) use($param){
            $sub->where('nama','ilike',"%$param[search]%");
        })
        ->orderBy($col[$param['sortCol'] - 1],$param['sortDir'])
        ->paginate($param['length']??10);
       
       
       return $data;
    }

    static public function find($id){
        return product::find($id);
    }

    static public function insert($data){

        DB::beginTransaction();
       try {
        
        $label = ProductLabel::where('nama',$data['label']??null)->first();
        $product = product::firstOrCreate([
            'nama' => $data['nama'],
            'reg' =>  $data['reg'],
        ],[
            'label_id' => $label->id??null,
            'keterangan' => $data['keterangan']??null
        ]);
        $barcode_path = DNS1D::getBarcodePNGPath($product->id.''.date('dmY'), 'EAN13');
        $product->barcode_path = $barcode_path;
        $product->update();
        
        SkuService::create($product->id,$data);
     
        DB::commit();
       } catch (\Throwable $th) {
        DB::rollBack();
        throw $th;
       }
    }

    static public function update(int $id, array $data){

        DB::beginTransaction();
        try {
            $updateData = [
                "nama" => $data['nama'],
                "reg" => $data['reg'],
                "barcode_path" => $data['barcode_path'],
                "image_path" => $data['image_path'],
                "keterangan" => $data['keterangan'],
            ];

            $updateData = array_filter($updateData);
            
            product::
            where('id',$id)
            ->update($updateData);

            if (isset($data['harga'])) {
                SkuService::update($id, $data['harga']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }



   
}