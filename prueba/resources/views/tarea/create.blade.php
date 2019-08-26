@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Creando nueva tarea</div>

                    <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{action('TareaController@store')}}">
                              @csrf 
                              <div class="form-group">
                                  <div class="form-group ">
                                    <label for="user">Usuario</label>
                                    <select id="user" class="form-control" name="user">
                                     @foreach ($users as $user)
                                        <option value="{{$user->id}}" name="user">{{$user->name}}</option>
                                     @endforeach
                                    </select>
                                  </div>
                              </div>
                                <div class="form-group">
                                  <label for="tarea">Tarea</label>
                                  <input type="text" class="form-control" id="tarea" name="tarea" placeholder="Anote una nueva tarea" required>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="fecha_inicio" >Fecha de inicio</label>
                                    <div>
                                      <input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" id="fecha_inicio" name="fecha_inicio" min="<?php echo date("Y-m-d");?>">
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="fecha_fin" >Fecha limite</label>
                                    <div>
                                        <input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" id="fecha_fin" name="fecha_fin" min="<?php echo date("Y-m-d");?>">
                                      </div>
                                  </div>
                                    
                                </div>
                               
                                <div class="form-group">
                                  <div class="form-group ">
                                    <label for="prioridad">Prioridad</label>
                                    <select id="prioridad" class="form-control" name="prioridad">
                                     @foreach ($prioridades as $prioridad)
                                    <option value="{{$prioridad->id}}">{{$prioridad->desc_prioridad}}</option>
                                     @endforeach
                                    </select>
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                      </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
@endsection