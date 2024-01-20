<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(Request $request){
        try {
            RoleUser::create();
            return response()
            ->json([
                'message' => 'role created'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id){
        try {
            RoleUser::where('id',$id)->delete();
            return response()
            ->json([
                'message' => 'role deleted'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
