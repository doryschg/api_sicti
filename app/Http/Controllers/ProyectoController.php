<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Proyecto_jefe;
use App\User;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyecto=Proyecto::select('proy.id_proy','titulo_proy','porc_ejec','fecha_inicio','fecha_fin','usuario.id','nombres','ap_pat','ap_mat')->join('proy_jefe','proy_jefe.id_proy','=','proy.id_proy')->join('usuario','usuario.id','=','proy_jefe.id_usuario')->get();
        
        return response()->json([
                "msg" => "exito",
          "proyecto" => $proyecto
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

        $proyecto=new Proyecto();
        $input = $request->all();
        $proyectos=$proyecto->create($input);

        $proyecto_jefe=new Proyecto_jefe();
        $proyecto_jefe->id_proy=$proyectos->id_proy;
        $proyecto_jefe->id_usuario=$request->id_usuario;
        $proyecto_jefe->save();

       // $proyecto_jefe= new Proyecto_jefe();
        
          return response()->json([
                "msg" => "exito",
          "proyecto" => $proyectos,"proyecto_jefe"=>$proyecto_jefe
            ], 200
        );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_proy)
    {
        $proyecto=Proyecto::find($id_proy);
        if (!$proyecto) {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un registro con ese código.'])],404);
        }


        $proyecto_jefe=Proyecto_jefe::where('id_proy',$id_proy)->first();
        $usuario=User::find($proyecto_jefe->id_usuario);

        return response()->json([
                "msg" => "exito",
          "proyecto" => $proyecto,"proyecto_jefe"=>$proyecto_jefe,"usuario"=>$usuario
            ], 200
        );

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
    public function update(Request $request, $id_proy)
    {
         
         $proyecto=Proyecto::find($id_proy);
        if (!$proyecto) {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un registro con ese código.'])],404);
        }

        $input = $request->all();
        $proyecto->update($input);

        //$proyecto->save();

          return response()->json([
                "msg" => "exito",
          "proyecto" => $proyecto
            ], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proy)
    {
         $proyecto=Proyecto::find($id_proy);
        if (!$proyecto) {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un registro con ese código.'])],404);
        }

        $proyecto_jefe=Proyecto_jefe::where('id_proy',$id_proy)->first();

        $proyecto_jefe->delete();

        $proyecto->delete();
        

            return response()->json([

            "mensaje" => "registro eliminado correctamente"
            ], 200
        );

    }

 

}
