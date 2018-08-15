<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();

        return response()->json([
                "msg" => "exito",
          "usuario"=>$user
            ], 200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= new User();

       /* $input = $request->all();
        $usuario=$user->create($input);*/

        $user->nombres=$request->nombres;
        $user->ap_pat=$request->ap_pat;
        $user->ap_mat=$request->ap_mat;
        $user->ci=$request->ci;
        $user->ext=$request->ext;
        $user->fecha_nac=$request->fecha_nac;
        $user->sexo=$request->sexo;
        $user->celular=$request->celular;
        $user->email=$request->email;
        $user->username=$request->username;
        $user->estado='activo';
        $user->password=Hash::make($request->password);
        $user->save();

        return response()->json([
                "msg" => "exito",
          "usuario" => $user
            ], 200
        );





        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
