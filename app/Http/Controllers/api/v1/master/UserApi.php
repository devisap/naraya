<?php

namespace App\Http\Controllers\api\v1\master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserApi extends Controller
{
    public function index(Request $req){
        try {
            $user = User::find($req->uId);

            if(!$user){
                response([
                    'status_code' => 200,
                    'status_message' => 'User not found'
                ], 200);
            }

            return response([
                'status_code'    => 200,
                'status_message' => 'User found',
                'data'           => $user
            ], 200);
        } catch (Exception $err) {
            return response([
                'status_code'    => 200,
                'status_message' => $err->getMessage()
            ], 200);
        }
    }
}
