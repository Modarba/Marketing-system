<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    public function register(Request $request)
    {
        $reg=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user=User::create([
            'name'=>$reg['name'],
            'email'=>$reg['email'],
            'password'=> bcrypt($reg['password'])
        ]);
        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=([
            'data'=>$user,
            'token'=>$token,
        ]);
        return response($response,201);
    }
    public function login(Request $request)
    {
        $log=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user=User::where('email',$log['email'])->first();
        if (!$user||!Hash::check($log['password'],$user->password)){
            return response([
                'message'=>'bad',
            ],401);
        }
        $token=$user->createToken('myapptoken')->plainTextToken;
        $response=([
            'data'=>$user,
            'token'=>$token,
        ]);
        return response($response,201);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message'=>'logged out'
        ];
    }

}
