<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class homeController extends Controller
{
    public function home(){
        return view('frontend/pages/dashboard');
    }
    
    public function adminSubmit(Request $request){
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard')->with('message' ,'login successfull');
        }else{
            return back()->with('error-message', 'Invalid Credentials...');
        }
    }

    public function login(){
        return view('frontend/pages/login');
    }

    //Register
    public function register(Request $request){
        $register = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "mobile_number" => $request->mobile_number
        ];
        Admin::create($register);
        return back();
    }
}
