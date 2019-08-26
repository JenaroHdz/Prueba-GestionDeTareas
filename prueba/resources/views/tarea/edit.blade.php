@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar tarea</div>
    
                    <div class="card-body">
                      
                            @foreach ($tareas as $tarea)
                    <form method="POST" action="{{action('TareaController@update',(array)$tarea)}}">
                              @csrf 
                              @method('PUT')
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                              <div class="form-group">
                                    <div class="form-group">
                                      <label for="tarea"><strong>{{$tarea->descripcion}}</strong></label>
                                    </div>
                                    <div class="form-group ">
                                      <label for="user">Usuario</label>
                                      <select id="user" class="form-control" name="user">
                                     @foreach ($users as $user)
                                      <option value="{{$user->id}} " name="user">{{$user->name}}</option>
                                     @endforeach
                                      </select>
                                    </div>
                                </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="fecha_i" >Fecha de inicio</label>
                                      <div>
                                        <input class="form-control" type="date" value="{{ date("Y-m-d",strtotime($tarea->fecha_inicio)) }}" id="fecha_i" name="fecha_i" min="{{ date("Y-m-d",strtotime($tarea->fecha_inicio)) }}">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="fecha_f" >Fecha de vencimiento</label>
                                      <div>
                                          <input class="form-control" type="date" value="{{date("Y-m-d",strtotime($tarea->fecha_fin))}}" id="fecha_f" name="fecha_f" min="{{date("Y-m-d",strtotime($tarea->fecha_fin))}}">
                                        </div>
                                    </div>
                                      
                                  </div>
                                 
                                  <div class="form-group">
                                    <div class="form-group ">
                                      <label for="prioridad">Prioridad</label>
                                      <select id="prioridad" class="form-control" name="prioridad">
                                              @foreach ($prioridades as $prioridad)
                                                <option value="{{$prioridad->id}} ">{{$prioridad->desc_prioridad}}</option>
                                              @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  {{--
                                    <div class="form-group">
                                      @foreach ($status as $statu)
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status" value="{{$statu->id}}">
                                        <label class="form-check-label" for="status">{{$statu->desc_status}} </label>
                                    </div>
                                    @endforeach
                                  </div>
                                  --}}

                              
                                <button type="submit" class="btn btn-primary">Guardar</button>
                      </form>
                      @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
@endsection