<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Http\Requests\ProviderRequest;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{

    public function index()//funcion para mostrar los libros
    {
        $providers = Provider::all();
        return $providers;
    }

    public function store(ProviderRequest $request)//funcion para crear los libros y ponerlos en la DB
    {
        $providers = Provider::create($request->all());

        return response()->json([
            'message'=> 'creado correctamente',
            'providers'=>$providers
        ],201);
    }

    public function show(Provider $providers){
        return response()->json($providers);
    }

    public function update(ProviderRequest $request,$providers)//para actualizar los libros de la DB
    {
        $providers = Provider::find($providers);
        $providers->update($request->all());
        return response()->json([
            'message'=> 'actualizado correctamente',
            'provider'=>$providers
        ],201);
    }


    public function destroy($providers)//para borrar los libros de la DB
    {
        $providers = Provider::find($providers);
        $providers->delete();

        return response()->json([
            'message'=> 'eliminado correctamente'
        ],201);
    }
}

