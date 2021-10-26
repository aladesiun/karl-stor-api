<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    //
    public function signup(Request $req){

        $this->validate($req,([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'confirmpassword' => ['required'],
        ] ) );
        $user = new User();
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->confirmpassword = Hash::make($req->confirmpassword);

        $user->save();

        $credentials = $req->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if($token=JWTAuth::attempt($credentials)){
            $user=User::where('id',auth::user($token)->id)->first();

            return response()->json([
                'status'=>true,
                'msg'=>"Login Successful",
                'token'=>$token,
                'data'=>$user
            ]);
        }else{
            return response()->json(
                [
                    "status"=>false,
                    "message"=>"Invalid login details"
                ]
            );
        }
    }


    public function login(Request $req){
        $credentials = $req->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if($token=JWTAuth::attempt($credentials)){
            $user=User::where('id',auth::user($token)->id)->first();

            return response()->json([
                'status'=>true,
                'msg'=>"Login Successful",
                'token'=>$token,
                'data'=>$user
            ]);
        }else{
            return response()->json(
                [
                    "status"=>false,
                    "message"=>"Invalid login details"
                ]
            );
        }
    }

}
