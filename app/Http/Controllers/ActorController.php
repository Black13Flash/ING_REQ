<?php

namespace Blockbuster\Http\Controllers;

use Illuminate\Http\Request;
//Nuevito
use Illuminate\Support\Facades\DB;
use Blockbuster\Actore;
use Auth;
//test Logs
use Illuminate\Support\Facades\Log;

class ActorController extends Controller
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

            $actores = Actore::all();

            return view('admin.actor.lista',array('actores'=>$actores));
        }else{
            return "cuecckkkkk";
        }
    }

    // ACTIVAR / INACTIVAR
    public function cambiaEstado(Request $request){
        if (Auth::guard('admin')->check()) {

            $actor = Actore::where('idActor',$request->idActor);
            $actor->update(['activo'=>$request->estado]);
            // $actor->activo = $request->estado;
            // $actor->save();

            $actores = Actore::all();

            return view('admin.actor.lista',array('actores'=>$actores));
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

            $actor = new Actore;
            $actor->nombre = $nombre;
            $actor->apellido = $apellido;
            $actor->activo = 1;

            $actor->save();

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
    //     return "store";
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
        return redirect()->intended(route('actores.index'));
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

            $actor = Actore::where('idActor',$id)->first();

            Log::info('que xuxa - '.$actor);

            if($actor){
                return view('admin.actor.lista',array('actor'=>$actor,'accion'=>'editar'));
            }else{
                return redirect()->intended(route('actores.index'));
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
            $apellido   = $request['txtApellido'];

            $actor = Actore::where('idActor',$id);
            $actor->update(['nombre'=>$nombre]);
            $actor->update(['apellido'=>$apellido]);

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
    //     return "destroy";
    // }
}
