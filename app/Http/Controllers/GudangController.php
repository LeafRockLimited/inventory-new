<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GudangService;
use App\Models\Gudang;
use Inertia\Inertia;

class GudangController extends Controller
{
    public function index(){
        $gudang = Gudang::paginate(10);
        return Inertia::render(
            'Gudang/Index',
            [
                'gudang' => $gudang
            ]
        );
    }

    public function tambahIndex(){
        return;
    }
    
    public function create(Request $request){
        $data = $request->all();

    }
}
