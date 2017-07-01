@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Mantenedor de Géneros</h3></div>

                <div class="panel-body">
                    @isset($generos)
                    <!-- lista -->
                    <table class="table table-bordered table-striped table-hover">
                        @if($generos)
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Activar/Inactivar</th>
                        </tr>
                        @foreach ($generos as $genero)
                        <tr>
                            <td>{{$genero->nombre}}</td>
                            <td>{{$genero->descripcion}}</td>
                            @if($genero->activo) 
                            <!-- <td>Activo</td> -->
                            <td>Activo</td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>Inactivo</td> 
                            @endif
                            <td>
                                <form action="{{route('generos.edit',['idGenero'=>$genero->idGenero])}}" method="GET">
                                    <div class="modificar">
                                        <button type="submit" class="btn btn-warning" value="Editar" >Editar</button>
                                    </div>
                                </form>
                            </td>
                            @if($genero->activo) 
                            <!-- <td>Activo</td> -->
                            <td>
                                <form action="{{url('/admin/generos/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idGenero" value="{{$genero->idGenero}}">
                                    <input type="hidden" name="estado" value="0">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Inactivar</button>    
                                    </div>
                                    
                                </form>
                            </td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>
                                <form action="{{url('/admin/generos/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idGenero" value="{{$genero->idGenero}}">
                                    <input type="hidden" name="estado" value="1">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Activar</button>
                                    </div>
                                </form>
                            </td> 
                            @endif
                        </tr>
                        @endforeach
                        @else
                        <strong>No se encontraron registros</strong>
                        @endif
                    </table>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Nuevo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('generos.create')}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}
                                            <strong>Nombre:</strong> <input type="text" name="txtNombre" value=""> </br></br>
                                            <strong>Descripción:</strong> <input type="text" name="txtDescripcion" value=""></br></br>
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                        </form>    
                                    </td>
                                </tr>
                            </table>        
                        </div>
                    </div>
                    @endisset
                    @isset($accion)
                    @if($accion==='editar')
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Modificación</th>
                                </tr>

                                <!-- SOLO UN RESULTADO -->                    
                                <tr>
                                    <td>
                                        <form action="{{route('generos.update',['idGenero'=>$genero->idGenero])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <strong>Nombre:</strong> <input type="text" name="txtNombre" value="{{$genero->nombre}}"> </br></br>
                                            <strong>Descripción:</strong> <input type="text" name="txtDescripcion" value="{{$genero->descripcion}}"></br></br>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{ url('/admin/generos') }}"><button type="button" class="btn btn-default" >Volver</button></a>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/test.js') }}"></script>
</div>
@endsection
