<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Services\PemasokService;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function create(Request $request){

       try {
        $data = $request->validate([
            'nama' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'keterangan' => 'nullable',
        ]);

        PemasokService::create($data);
        return response()
        ->json([
            'message' => 'data created'
        ]);
       } catch (\Throwable $th) {
            throw $th;
       }
    }

    public function update(Request $request,$id){

        try {
            $data = $request->validate([
                'nama' => 'nullable',
                'kontak' => 'nullable',
                'negara' => 'nullable',
                'provinsi' => 'nullable',
                'kota' => 'nullable',
                'alamat' => 'nullable',
                'keterangan' => 'nullable',
            ]);
            $data = array_filter($data);
            PemasokService::update($id,$data);
            return response()
            ->json([
                'message'=>'data updated'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function delete($id){
        try {
            Pemasok::find($id)->delete();
            return response()
            ->json([
                "message" => 'data deleted'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
