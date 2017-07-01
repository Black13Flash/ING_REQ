<?php

namespace Blockbuster\Http\Controllers;

use Illuminate\Http\Request;
//Nuevito
use Illuminate\Support\Facades\DB;
use Blockbuster\Directore;
use Auth;
//test Logs
use Illuminate\Support\Facades\Log;

class DirectoreController extends Controller
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

            $directores = Directore::all();

            return view('admin.director.lista',array('directores'=>$directores));
        }else{
            return "cuecckkkkk";
        }
    }

    // ACTIVAR / INACTIVAR
    public function cambiaEstado(Request $request){
        if (Auth::guard('admin')->check()) {

            $director = Directore::where('idDirector',$request->idDirector);
            $director->update(['activo'=>$request->estado]);
            // $director->activo = $request->estado;
            // $director->save();

            $directores = Directore::all();

            return view('admin.director.lista',array('directores'=>$directores));
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
            $apellido   = $request['txtApellido'];

            $director = new Directore;
            $director->nombre = $nombre;
            $director->apellido = $apellido;
            $director->activo = 1;

            $director->save();

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
        return redirect()->intended(route('directores.index'));
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

            $director = Directore::where('idDirector',$id)->first();

            Log::info('que xuxa - '.$director);

            if($director){
                return view('admin.director.lista',array('director'=>$director,'accion'=>'editar'));
            }else{
                return redirect()->intended(route('directores.index'));
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
        //
        //return "update".$request." --> ".$id;
        if (Auth::guard('admin')->check()) {
            
            //////////////////////
            //  VALIDAR DATOS !
            //////////////////////
            $nombre     = $request['txtNombre'];
            $apellido   = $request['txtApellido'];

            $director = Directore::where('idDirector',$id);
            $director->update(['nombre'=>$nombre]);
            $director->update(['apellido'=>$apellido]);

            // return redirect()->intended(route('directores.index'));
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
