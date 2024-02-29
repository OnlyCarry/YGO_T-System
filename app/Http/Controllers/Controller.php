<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Models;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function SaveUser(Request $request) {

        $user = array(
            'nickname' => $request->input('nickname'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'picture' => $request->input('picture'),
            'give_name' => $request->input('give_name'),
            'family_name' => $request->input('family_name'),
            'verified_email' => $request->input('verified_email'),
            'id' => $request->input('id')
        );

        $userModel = Users::firstOrCreate($user);

        if(!$userModel){
            return response()->json([
                'status' => 500,
                'error' => 'Algo salio mal'
            ], 500);
        }
    } 
}
