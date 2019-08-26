@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <!-- You are logged in! -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th></th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                                @forelse ($users as $user)
                                 <tr>
                                    <th>{{ $user->name }}</th>
                                    <th>
                                        @foreach ($user->roles as $role)
                                            {{ $role->description.' | ' }}
                                        @endforeach
                                    </th>
                                    <th >
                                        <a href="{{action('TareaController@index')}}"><i class="fas fa-eye"></i></a>
                                        <a href="{{action('TareaController@update',$user)}}"><i class="fas fa-pen"></i></a>
                                        <a href="{{action('TareaController@destroy',$user)}}"><i class="fas fa-trash"></i></a> 
                                    </th>
                                </tr>
                                @empty

                                @endforelse

                            
                        </tbody>
                        
                    </table>
                    <tfoot>
                        
                    </tfoot>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection