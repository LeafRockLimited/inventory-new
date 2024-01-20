<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function userManagementIndex(){
        return Inertia::render('User/UserManagement');
    }

    public function show(Request $request){
        $length = $request->length??10;
        $search = $request->search??null;
        $data = User::with('role')
        ->when($search,function($sub) use($search){
            $sub->where('name','ilike',"$search%");
        })
        ->paginate($length);

        return response()
        ->json($data);
    }

    public function delete($id){
        try {
            User::find($id)->delete();
            return response()
            ->json([
                "message" => 'data deleted'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
