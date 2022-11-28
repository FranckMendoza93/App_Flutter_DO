<?php

namespace App\Http\Controllers;
use App\Models\m_negocio;
use Illuminate\Http\Request;

class negocioController extends Controller
{
    public function add(Request $request){

        if($request->id == 0){
            $negocio = new m_negocio();
            $mensaje = "Negocio Agregado Correctamente";

        }else{
            $negocio = m_negocio::find($request->id);
            $mensaje = "Negocio Modificado Correctamente";
        }


        $negocio->nombre = $request->nombre;
        $negocio->descripcion = $request->descripcion;
        $negocio->ubicacion = $request->ubicacion;

        $negocio->save();
        return $mensaje;

    }

    public function select(Request $request){
        $sql = m_negocio::select('id','nombre','descripcion','ubicacion')->get();
        return $sql;
    }
    public function delete(Request $request){
        $negocio = m_negocio::find($request->id);

        $negocio->delete();
        return "Negocio Eliminado Correctamente";

    }
}
