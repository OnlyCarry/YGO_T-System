<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function saveUser(Request $request) {

        $user = $request->json()->all();

        $userModel = Users::firstOrCreate($user);

        if(!$userModel){
            return response()->json([
                'status' => 500,
                'error' => 'Algo salio mal al guardar usuario'
            ], 500);
        } else {
            $token = $userModel -> createToken('ApiCollectionTCG')->plainTextToken;

            return response()->json([
                'status' => 200,
                'tocken' => $token
            ], 200);
        }

    } 
}
