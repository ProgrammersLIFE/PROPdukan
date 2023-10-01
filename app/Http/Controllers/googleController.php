<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Laravel\Socialite\Facades\Socialite;


class googleController extends Controller
{
    public function loginwithGoogle(){
       return Socialite::driver('google')->redirect();

    }

    public function callbackFromGoogle(){

        $user = Socialite::driver('google')->user();
        return $user;   
        $data = Admin::where('email',$user->email)->first();
        if(is_null($data)){
            $user = [
                "name" => $user->name,
                "email" => $user->email,
            ];
            $data = Admin::create($user);
        }   
        Auth::login($data);
        return redirect('home');

    }

}
