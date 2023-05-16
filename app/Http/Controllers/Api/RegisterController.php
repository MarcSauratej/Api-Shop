<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[//validamos los datos con una serie de requisitos
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());//si no cumple los requisitos nos da error
        }
        $user= User::create([//crea el usuario
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)//ponemos el metodo Hash para la contraseña
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;// cramos un token para entrar en la aplicacion

        return response()->json([// le enviamos los datos
            'message'=> 'registrado correctamente',
            'user'=> $user,
            'token'=>$token
        ],201);
    }
}
