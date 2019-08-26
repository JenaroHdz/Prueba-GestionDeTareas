@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Asignacion de tareas</div>
                        <div class="card-body">
                        <form method="PUT" action="{{action('TareaController@asignar')}}">
                        @csrf
                        <div class="form-group">
                            <div class="form-group ">
                              <label for="user">Usuario</label>
                              <select id="user" class="form-control" name="user">
                               @foreach ($prioridades as $prioridad)
                              <option value="{{$prioridad->id}}">{{$prioridad->name}}</option>
                               @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-check col-md-12">
                         @foreach ($tareas as $tarea)
                        <input class="form-check-input" type="checkbox" name="tareas[]" id="tareas" value="{{$tarea->id_tarea}}" aria-label="...">
                         <label for="tareas" name="areas">{{$tarea->descripcion}}</label>
                         <br>
                         @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection