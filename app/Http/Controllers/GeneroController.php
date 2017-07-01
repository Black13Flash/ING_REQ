<?php

namespace Blockbuster\Http\Controllers;

use Illuminate\Http\Request;
//Nuevito
use Illuminate\Support\Facades\DB;
use Blockbuster\Genero;
use Auth;
//test Logs
use Illuminate\Support\Facades\Log;

class GeneroController extends Controller
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
        //
        if(Auth::guard('admin')->check()){
            //if sussefu then redirect ti their intentder location

            // $actores = DB::select('SELECT * FROM actores');

            $generos = Genero::all();
            Log::info('generos - '.$generos);

            return view('admin.genero.lista',array('generos'=>$generos));
        }else{
            return "cuecckkkkk";
        }
    }

    // ACTIVAR / INACTIVAR
    public function cambiaEstado(Request $request){
        if (Auth::guard('admin')->check()) {

            $genero = Genero::where('idGenero',$request->idGenero);
            $genero->update(['activo'=>$request->estado]);
            // $genero->activo = $request->estado;
            // $genero->save();

            $generos = Genero::all();

            return view('admin.genero.lista',array('generos'=>$generos));
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
            $nombre        = $request['txtNombre'];
            $descripcion   = $request['txtDescripcion'];

            $genero = new Genero;
            $genero->nombre = $nombre;
            $genero->descripcion = $descripcion;
            $genero->activo = 1;

            $genero->save();

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
        return redirect()->intended(route('generos.index'));
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
        if (Auth::guard('admin')->check()) {

            $genero = Genero::where('idGenero',$id)->first();

            Log::info('que xuxa - '.$genero);

            if($genero){
                return view('admin.genero.lista',array('genero'=>$genero,'accion'=>'editar'));
            }else{
                return redirect()->intended(route('generos.index'));
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
        if (Auth::guard('admin')->check()) {
            
            //////////////////////
            //  VALIDAR DATOS !
            //////////////////////
            $nombre     = $request['txtNombre'];
            $descripcion   = $request['txtDescripcion'];

            $genero = Genero::where('idGenero',$id);
            $genero->update(['nombre'=>$nombre]);
            $genero->update(['descripcion'=>$descripcion]);

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
