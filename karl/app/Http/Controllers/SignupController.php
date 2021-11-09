<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Mail\Signin;
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

            Mail::to($req->email)->send(new Signin([
                'subject'=>'Reset Password',
                'title'=>'Reset Password',
                'content' => '<p>Click on the below link to reset your password <p></a></p></p>'
            ]));
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
            Mail::to('aladesiuntope@gmail.com')->send(new Signin([
                'subject'=>'Welcome to Karl Store by kaffir',
                'title'=>'feel free to picki items of your choice and order',
                'content' => '<p>verify your email with this link to have full access<p></a></p></p>'
            ]));
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
    public function reset_password(Request $request){
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'msg' => "Account not found"
            ]);
        }

        $user->remember_token = mt_rand(99999, 99999999) . str::random(12) . mt_rand(99999, 99999999) . Str::random(12);
        $user->save();

        $link = env('APP_FRONTEND') . "/reset-password/" . $user->remember_token;

        Mail::to($request->email)->send(new Signin([
            'subject'=>'Reset Password',
            'title'=>'Reset Password',
            'content' => '<p>Click on the below link to reset your password <p><a href="'. $link .'">'. $link .'</a></p></p>'
        ]));

        return response()->json([
            'status' => true,
            'msg' => "Reset mail has been sent",
            'link' => $link
        ]);
    }


}
