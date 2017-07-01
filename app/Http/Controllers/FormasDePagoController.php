<?php

namespace Blockbuster\Http\Controllers;

use Illuminate\Http\Request;
//Nuevito
use Illuminate\Support\Facades\DB;
use Blockbuster\FormasDePago;
use Auth;
//test Logs
use Illuminate\Support\Facades\Log;

class FormasDePagoController extends Controller
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

            $formasdepagos = FormasDePago::all();

            Log::info('que xuxa - '.$formasdepagos);

            return view('admin.formasdepago.lista',array('formasdepagos'=>$formasdepagos));
        }else{
            return "cuecckkkkk";
        }
    }

    // ACTIVAR / INACTIVAR
    public function cambiaEstado(Request $request){
        if (Auth::guard('admin')->check()) {

            $formasdepago = FormasDePago::where('idPago',$request->idPago);
            $formasdepago->update(['activo'=>$request->estado]);
            // $formasdepago->activo = $request->estado;
            // $formasdepago->save();

            $formasdepagos = FormasDePago::all();

            return view('admin.formasdepago.lista',array('formasdepagos'=>$formasdepagos));
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
            $nombre     = $request['txtNombre'];
            $descripcion   = $request['txtDescripcion'];

            $formasdepago = new FormasDePago;
            $formasdepago->nombre = $nombre;
            $formasdepago->descripcion = $descripcion;
            $formasdepago->activo = 1;

            $formasdepago->save();

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
        return redirect()->intended(route('formasdepagos.index'));
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

            $formasdepago = FormasDePago::where('idPago',$id)->first();

            $formularios = DB::table('form_formas_de_pagos')->where('idPago', $id)->get();


            Log::info('********** ********** ********** ');
            Log::info('********** FORMULARIO ********** '.$formularios);
            Log::info('********** ********** ********** ');

            if($formasdepago){
                return view('admin.formasdepago.lista',array('formasdepago'=>$formasdepago,'accion'=>'editar','formularios'=>$formularios));
            }else{
                return redirect()->intended(route('formasdepagos.index'));
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
            $nombre     = $request['txtNombre'];
            $descripcion   = $request['txtDescripcion'];

            $formasdepago = FormasDePago::where('idPago',$id);
            $formasdepago->update(['nombre'=>$nombre]);
            $formasdepago->update(['descripcion'=>$descripcion]);

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
    public function destroy($id)
    {
        //
    }
}
