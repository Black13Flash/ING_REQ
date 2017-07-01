@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Mantenedor de Formas de Pagos</h3></div>

                <div class="panel-body">

                    @isset($formasdepagos)
                    @if( count($formasdepagos) === 1 )

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Nuevo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('formasdepago.create')}}" method="POST">
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

                    <!-- UNA SOLA SHIT -->
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Activar/Inactivar</th>
                        </tr>
                        <tr>
                            <td>{{$formasdepagos[0]->nombre}}</td>
                            <td>{{$formasdepagos[0]->descripcion}}</td>
                            @if($formasdepagos[0]->activo) 
                            <!-- <td>Activo</td> -->
                            <td>Activo</td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>Inactivo</td> 
                            @endif
                            <td>
                                <form action="{{route('formasdepago.edit',['idPago'=>$formasdepagos[0]->idPago])}}" method="GET">
                                    <div class="modificar">
                                        <button type="submit" class="btn btn-warning" value="Editar" >Editar</button>
                                    </div>
                                </form>
                            </td>
                            @if($formasdepagos[0]->activo) 
                            <!-- <td>Activo</td> -->
                            <td>
                                <form action="{{url('/admin/formasdepagos/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idPago" value="{{$formasdepagos[0]->idPago}}">
                                    <input type="hidden" name="estado" value="0">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Inactivar</button>    
                                    </div>

                                </form>
                            </td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>
                                <form action="{{url('/admin/formasdepago/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idPago" value="{{$formasdepagos[0]->idPago}}">
                                    <input type="hidden" name="estado" value="1">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Activar</button>
                                    </div>
                                </form>
                            </td> 
                            @endif
                        </tr>
                    </table>
                    @elseif( count($formasdepagos) > 1 )
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Nuevo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('formasdepago.create')}}" method="POST">
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
                    <!-- MUCHAS SHITS -->
                    <!-- lista -->
                    <table class="table table-bordered table-striped table-hover">
                        @if($formasdepagos)
                        <tr>
                            <th>Nombre</th>
                            <th>descripcion</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Activar/Inactivar</th>
                        </tr>
                        @foreach ($formasdepagos as $formasdepago)
                        <tr>
                            <td>{{$formasdepago->nombre}}</td>
                            <td>{{$formasdepago->descripcion}}</td>
                            @if($formasdepago->activo) 
                            <!-- <td>Activo</td> -->
                            <td>Activo</td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>Inactivo</td> 
                            @endif
                            <td>
                                <form action="{{route('formasdepago.edit',['idPago'=>$formasdepago->idPago])}}" method="GET">
                                    <!-- <input type="hidden" name="idPago" value="{{$formasdepago->idPago}}"> -->
                                    <div class="modificar">
                                        <button type="submit" class="btn btn-warning" value="Editar" >Editar</button>
                                    </div>
                                </form>
                            </td>
                            @if($formasdepago->activo) 
                            <!-- <td>Activo</td> -->
                            <td>
                                <form action="{{url('/admin/formasdepago/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idPago" value="{{$formasdepago->idPago}}">
                                    <input type="hidden" name="estado" value="0">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Inactivar</button>    
                                    </div>

                                </form>
                            </td> 
                            @else 
                            <!-- <td>Inactivo</td> -->
                            <td>
                                <form action="{{url('/admin/formasdepago/cambiaestado')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idPago" value="{{$formasdepago->idPago}}">
                                    <input type="hidden" name="estado" value="1">
                                    <div class="cambiaEstado">
                                        <button type="submit" class="btn btn-default">Activar</button>
                                    </div>
                                </form>
                            </td> 
                            @endif
                        </tr>

                        @endforeach
                    </table>
                    @else
                    <strong>No se encontraron registros</strong>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Nuevo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('formasdepago.create')}}" method="POST">
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
                    @endif
                </table>
                @else
                <!-- NOTHING -->
                <strong>No se encontraron registros</strong>
                @endif
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
                                    <form action="{{route('formasdepago.update',['idPago'=>$formasdepago->idPago])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <strong>Nombre:</strong> <input type="text" name="txtNombre" value="{{$formasdepago->nombre}}"> </br></br>
                                        <strong>Descripción:</strong> <input type="text" name="txtDescripcion" value="{{$formasdepago->descripcion}}"></br></br>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="{{ url('/admin/formasdepago') }}"><button type="button" class="btn btn-default" >Volver</button></a>
                                    </form>
                                </td>
                            </tr>
                        </table>    
                    </div>
                </div>
                    @isset($formularios)
                    
                    @if( count($formularios) === 1 )
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-info">
                            <strong>Información</strong> Las secuencias son las consultas que hará la forma de pago.
                        </div>
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Secuencia</td>
                                    <td>Nombre</td>
                                    <td>Estado</td>
                                </tr>
                                <tr>
                                    <td>{{$formularios[0]->secuencia}}</td>
                                    <td>{{$formularios[0]->nombre}}</td>
                                    <td>{{$formularios[0]->activo}}</td>
                                </tr>
                            </table>    
                        </div>
                    </div>
                    @elseif( count($formularios) > 1 )
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-info">
                                <strong>Información</strong> Las secuencias son las consultas que hará la forma de pago.
                            </div>
                                <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <td>Secuencia</td>
                                    <td>Nombre</td>
                                    <td>Estado</td>
                                </tr>
                                @for ($i=0; $i < count($formularios); $i++)
                                    <tr>
                                        <td>{{$formularios[$i]->secuencia}}</td>
                                        <td>{{$formularios[$i]->nombre}}</td>
                                        <td>{{$formularios[$i]->activo}}</td>
                                    </tr>
                                @endfor
                                </table>
                            </div>
                        </div>      
                    @else
                    <strong>No se encontraron registros</strong>
                    @endif
                    @endisset
                @endif
                @endisset
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/test.js') }}"></script>
</div>
@endsection
