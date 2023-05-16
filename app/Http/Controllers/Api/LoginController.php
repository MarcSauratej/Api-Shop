<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);//envia los datos  en la funcion validate login

        if(Auth::attempt($request->only('email','password'))){//una vez validados crea el token o no
            return response()->json([
                'token' =>$request->user()->createtoken($request->name)->plainTextToken,
                'message'=>'Success'
            ]);
        }
        return response()->json([
            'message'=>'Unauthenticated'
        ],401);
    }

    public function validateLogin(Request $request)//valida los datos
    {
        return $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return[
            'message'=>'Arios he'
        ];
    }
}
