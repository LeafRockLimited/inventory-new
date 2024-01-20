<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductLabel;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductLabelController extends Controller
{

    public function findAllWithProduct($label_id){
        try {
            $data = ProductLabel::find($label_id)->produk()->paginate();
            return response()
            ->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findAll(){
        $data = ProductLabel::get();

        return response()
        ->json($data);
    }

    public function create(Request $request){
        try {
            $data = $request->validate([
                'nama' => 'required'
            ]);

            ProductLabel::create($data);
            return response()
            ->json([
                "message" => 'data created'
            ]);
        } 
        catch (ValidationException $err){
            throw $err;
        }
        catch (\Throwable $th) {
            return response()
            ->json([
                "message" => $th
            ],500);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $request->validate([
                'nama' => 'required'
            ]);

            ProductLabel::find($id)->update($data);
            return response()
            ->json([
                "message" => 'data updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id){
        try {
            ProductLabel::find($id)->delete();
            return response()
            ->json([
                "message" =>"data deleted"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
