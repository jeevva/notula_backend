<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    function submitLogin(Request $request) {
        // $login = DB::table('users')
        //     ->where('email', $request->email)
        //     ->where('password', $request->password)
        //     ->get();

        // //Dengan metode Json Array
        // if (count($login) > 0) {
        //     foreach ($login as $dt) {
        //         $response["error"] = FALSE;
        //         $response["success"] = "1";
        //         $response["message"] = "Data Ditemukan";
        //         $response["logindata"][]=array(
        //             'id' => $dt->id,
        //             'name' => $dt->name,
        //             'email' => $dt->email,
        //             'password' => $dt->password
        //         );
        //     }
        //     echo json_encode($response);
        // } else {
        //     $response["error"] = TRUE;
        //     $response["success"] = "0";
        //     $response["message"] = "Data Kosong";
        //     $response["logindata"][]=array();
        //     echo json_encode($response);
        // }
    }

    public function login(Request $request){

        $creds = $request->only(['email','password']);

        if(!$token=auth()->attempt($creds)){

            return response()->json([
                'success'=>false,
                'message' => 'invalid credintials'
            ]);
        }

            return response()->json([

            'success' =>true,
            'token' => $token,
            'user' => Auth::user()
        ]);
    }

    // public function register(Request $request){

    //     $encryptedPass = Hash::make($request->password);

    //     $user = new User;

    //     try{
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = $encryptedPass;
    //         $user->save();
    //         return $this->login($request);

    //     }
    //     catch(Exception $e){
    //         return respone()->json([
    //             'success'=>false,
    //             'message'=>''.$e

    //         ]);
    //     }
    // }

    // public function logout (Request $request){
    //     try{
    //         JWTAuth::invalidate(JWTAuth::parseToken($request->token));
    //         return response()->json([
    //             'success'=>true,
    //             'message'=>'logout success'

    //         ]);
    //     }
    //     catch(Execption $e){
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>''.$e

    //         ]);
    //     }
    // }
}
