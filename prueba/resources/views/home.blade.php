@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Tareas</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tareas</th>
                                <th>Asignado</th>
                                <th>Prioridad </th>
                                <th>Fecha de asignacion</th>
                                <th>Fecha limite</th>
                                <th>Estado</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tareas as $tarea)
                           <tr>
                                <td>{{$tarea->descripcion}}</td>
                                <td>{{$tarea->name}}</td>
                                <td>{{$tarea->desc_prioridad}}</td>
                                <td>{{date('d-m-Y', strtotime($tarea->fecha_inicio))}}</td>
                                <td>{{date('d-m-Y', strtotime($tarea->fecha_fin))}}</td>
                                <td>{{$tarea->desc_status}}</td>
                                <td>
                                    <a href="{{action('TareaController@edit',(array)$tarea)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{action('TareaController@destroy',(array)$tarea)}}"><i class="fas fa-trash" style="color:red;"></i></a>
                                </td>
                           </tr>
                            @empty
                                
                            @endforelse
                                

                            
                        </tbody>
                        
                    </table>
                    <tfoot>
                        <a href="{{action('TareaController@create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Nueva tarea</a>
                      
                        {{--<a href="{{action('RoleController@index')}}" class="btn btn-success">Ver asignacion por usuarios</a>--}}

                    </tfoot>
                </div>
                
            </div>
            <br>
            <example-component></example-component>

        </div>
    </div>
</div>
@endsection
