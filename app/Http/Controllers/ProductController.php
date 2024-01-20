<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        return Inertia::render('Produk/ProdukView');
    }

    public function create(){
        return Inertia::render('Produk/Create');
    }
    
    public function data(Request $request){
        $param = [
            'search' => $request->search,
            'sortDir' => $request->dir??'ASC',
            'sortCol' => $request->col,
            'length' => $request->length
        ];
        $data = ProductService::fetch($param);
        return response()
        ->json($data);
    }

    public function insert(Request $request){
        try {

            $request->validate([
                'nama' => 'required',
                'reg' => 'required',
                'label' => 'nullable',
                'barcode_path' => 'nullable',
                'image_path' => 'nullable',
                'keterangan' => 'nullable',
            ]);

            ProductService::insert($request->all());
            return response()
            ->json([
                "message" => "success create data"
            ]);
        } 
        catch(ValidationException $err){
            throw $err;
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id){
        try {
            ProductService::update($id, $request->all());
            return response()
            ->json([
                'message' => 'success update data'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id){
        try {
            
            product::find($id)->delete();
            return response()
            ->json([
                'message' => 'success delete data'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function labeling(Request $request, $product_id){
        try {
            $data = $request->validate([
                'label_id' => 'required',
                'label_name' => 'nullable'
            ]);

            $product = ProductService::find($product_id);
            $product->label_id = $data['label_id'];
            $product->save();

            return response()
            ->json([
                "message" => 'success labeling product'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function rekapFindAll(Request $request){
        
    }
}
