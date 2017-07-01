<?php

namespace Blockbuster\Http\Controllers;

use Illuminate\Http\Request;
//Nuevito
use Illuminate\Support\Facades\DB;
use Blockbuster\BaseConocimiento;
use Auth;
//test Logs
use Illuminate\Support\Facades\Log;

class BaseConocimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //VALIDAR USUARIO ADMIN
        if(Auth::guard('admin')->check()){
            //if sussefu then redirect ti their intentder location

            // $actores = DB::select('SELECT * FROM actores');

            $baseconocimientos = BaseConocimiento::all();

            return view('admin.baseconocimiento.lista',array('baseconocimientos'=>$baseconocimientos));
        }else{
            return "cuecckkkkk";
        }
    }

    // ACTIVAR / INACTIVAR
    public function cambiaEstado(Request $request){
        if (Auth::guard('admin')->check()) {

            $baseconocimientos = BaseConocimiento::where('idBK',$request->idBK);
            $baseconocimientos->update(['activo'=>$request->estado]);
            // $baseconocimientos->activo = $request->estado;
            // $baseconocimientos->save();

            $baseconocimientos = BaseConocimiento::all();

            return view('admin.baseconocimiento.lista',array('baseconocimientos'=>$baseconocimientos));
        }else{
            return "lero lero desde cambiaEstado";    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return "create";
        if (Auth::guard('admin')->check()) {
            
            //////////////////////
            //  VALIDAR DATOS !
            //////////////////////
            $pregunta     = $request['txtPregunta'];
            $respuesta   = $request['txtRespuesta'];

            $baseconocimiento = new BaseConocimiento;
            $baseconocimiento->pregunta = $pregunta;
            $baseconocimiento->respuesta = $respuesta;
            $baseconocimiento->activo = 1;

            $baseconocimiento->save();

            // return redirect()->intended(route('actores.index'));
            return redirect()->back();
        }else{
            return "que paso wn";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect()->intended(route('baseconocimientos.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "edit".$id;
        if (Auth::guard('admin')->check()) {

            $baseconocimiento = BaseConocimiento::where('idBK',$id)->first();

            Log::info('que xuxa - '.$baseconocimiento);

            if($baseconocimiento){
                return view('admin.baseconocimiento.lista',array('baseconocimiento'=>$baseconocimiento,'accion'=>'editar'));
            }else{
                return redirect()->intended(route('baseconocimientos.index'));
            }
        }else{
            return "lero lero desde cambiaEstado";    
        }
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
        //return "update".$request." --> ".$id;
        if (Auth::guard('admin')->check()) {
            
            //////////////////////
            //  VALIDAR DATOS !
            //////////////////////
            $pregunta     = $request['txtPregunta'];
            $respuesta   = $request['txtRespuesta'];

            $baseconocimiento = BaseConocimiento::where('idBK',$id);
            $baseconocimiento->update(['pregunta'=>$pregunta]);
            $baseconocimiento->update(['respuesta'=>$respuesta]);

            // return redirect()->intended(route('actores.index'));
            return redirect()->back();
        }else{
            return "que paso wn";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
