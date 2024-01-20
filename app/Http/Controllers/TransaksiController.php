<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransaksiService;

class TransaksiController extends Controller
{

    public function penjualan(Request $request){

        try {
            $data = $request->validate([
                'product_id' => 'required|integer',
                'stok_keluar' => 'required',
                'nominal' => 'required',
                'keterangan' => 'nullable',
                'bukti_tf' => 'nullable',
                'pembeli' => 'nullable',
                'keterangan' => 'nullable',

            ]);
            TransaksiService::create($data);
    
            return response()
            ->json([
                "message" => "penjualan created"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function pembelian(Request $request){
        try {
            $data = $request->validate([
                'product_id' => 'required|integer',
                'stok_masuk' => 'required',
                'nominal' => 'required',
                'pemasok' => 'required',
                'keterangan' => 'nullable',
                'bukti_tf' => 'nullable',
                'penjual' => 'nullable',
                'keterangan' => 'nullable',

            ]);

            TransaksiService::create($data);

            return response()
            ->json([
                "message" => "penjualan created"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
