<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;


class ApiAuthcontroller extends Controller
{   

    
    public function login(Request $request)
    {   
        $credentials = $request->only('username', 'password');
        $token = null; //donde se almacenara el token

        try{   
            //con las credenciales de inicio de sesion se crea el token
            if(!$token = JWTAuth::attempt($credentials)){
                
                //return response()->json(['error' => 'credenciales invalidos']);

                return response()->json(['error' => 'credenciales invalidos']);


                //return response()->json(['kkk' => $credentials]);
            }
        }catch(JWTException $ex){
            return response()->json(['error' => 'algo no esta bien'], 500);
        }
        //User relacionado con el token
        $user = JWTAuth::toUser($token);
        //$rol=Rol::where('rol_id',$user->rol_id)->first();
        //return response()->json($user);

        return response()->json(compact('token','user'));
    }

    
}