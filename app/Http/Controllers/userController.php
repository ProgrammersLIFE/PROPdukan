<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){
            $user = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ];
            User::create($user);
            return response()->json(['status' => 200, 'message' => 'User created successfuly']);
        }
        return view("admin/pages/users/create");
    }
}
