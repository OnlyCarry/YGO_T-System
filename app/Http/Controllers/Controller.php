<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Tournament;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function saveUser(Request $request) {

        $user = $request->json()->all();

        $userModel = Users::firstOrCreate($user);

        $user = Users::where('id',$user['id'])->first();
        Auth::guard('web')->login($user);

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

    function getLastesTournaments() {
        $tournaments = Tournament::orderBy('start_date', 'desc')->take(5)->get();

        return response()->json([
            'status' => 200,
            'tournaments' => $tournaments
        ], 200);
    }
}
