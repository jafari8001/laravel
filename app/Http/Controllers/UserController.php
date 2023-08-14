<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function register(Request $request){
        $inputs = $request->only([
            'name',
            'email',
            'password',
            'phonenumber',
            'gender',
            'role'
        ]);

        try {
            // $user = DB::table('user')->insert($inputs);
            $user = User::create($inputs);
            return Response()->json([
                'status'=> "200",
                'message'=> "create user successful",
                'data'=> $user 
            ]);
        } catch (Exception $err) {
            return Response()->json([
                    'status'=> $err->getCode(),
                    'message'=> $err->getMessage(),
                    'file'=> $err->getFile(),
                    'line'=> $err->getLine()
                ]);
        }
    }
}
