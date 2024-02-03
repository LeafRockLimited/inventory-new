<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukMasukRequest;
use Illuminate\Http\Request;
use App\Services\GudangService;
use App\Models\Gudang;
use Inertia\Inertia;

class GudangController extends Controller
{
    public function index(){

        $gudangClass = new Gudang();
        $gudang = clone $gudangClass;
        $gudangCount = clone $gudangClass;

        return Inertia::render(
            'Gudang/Index',
            [
                'gudang' => $gudang->paginate(),
                'gudang_count' => $gudang->count(),
                'gudang_aktif_count' => $gudang->where('active',true)->count()
            ]
        );
    }

    public function barangMasuk(ProdukMasukRequest $request){
        dd($request);
    }


    public function tambahIndex(){
        return;
    }
    
    public function create(Request $request){
        $data = $request->all();

    }
}
