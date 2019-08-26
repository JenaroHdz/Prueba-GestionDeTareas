<?php

namespace App\Http\Controllers;

use App\Prioridad;
use App\Tarea;
use App\User;
use App\Estatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

 


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        $prioridades = User::all();
        return view('tarea.index',compact(['tareas','prioridades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::All(); 
        $prioridades = Prioridad::All(); 
        $status = Estatus::All();
        return view('tarea.create',compact(['users','prioridades','status']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'tarea'               => 'required',
            'fecha_inicio'        => 'date',
            'fecha_fin'           => 'date|after_or_equal:fecha_inicio',

        ]);

        $hoy= date("Y-m-d");
        $fechaFormulario = $request->get('fecha_inicio');
        //$fecha_i;
        //$fecha_f; 
        $status;   
         // Si la fecha es de apartir de hoy => true 
        if ($hoy == $fechaFormulario) {
            $status = 3; //En proceso
        }
        elseif($hoy < $fechaFormulario) {
            $status = 1; //Por iniciar
        } elseif($hoy > $fechaFormulario){
            $status = 2; //Atrasado
        } 

        
        $tarea = new Tarea([
            'descripcion' => $request->get('tarea'),
            'prioridad' => $request->get('prioridad'),
            'fecha_inicio' => $request->get('fecha_inicio'),
            'fecha_fin' => $request->get('fecha_fin'),
            'id_user' => $request->get('user'),
            'status' => $status     
        ]);
        $tarea->save();
 
        return redirect('/home');
    }

      

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();

        return redirect()->action('HomeController@index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users = User::All();
        $prioridades = Prioridad::All();  
        $status = Estatus::All();
        $tareas = DB::table('tareas')
        ->join('prioridads', 'tareas.prioridad', '=', 'prioridads.id')
        ->join('users', 'tareas.id_user', '=', 'users.id')
        ->join('estatuses', 'tareas.status', '=', 'estatuses.id')
        ->select('tareas.*','prioridads.desc_prioridad', 'users.name','estatuses.desc_status')
        ->where('tareas.id','=', $id)
        ->get();
        
        return view('tarea.edit', compact(['tareas','users','prioridades','status']));
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
        $this->validate($request, [
            'fecha_inicio'        => 'date',
            'fecha_fin'           => 'date|after_or_equal:fecha_inicio',
        ]);


       $tarea = Tarea::find($id);
       
       $tarea->prioridad = $request->get('prioridad');
       $tarea->fecha_inicio =  $request->get('fecha_i');
       $tarea->fecha_fin = $request->get('fecha_f');
       $tarea->id_user = $request->get('user');
   
       $tarea->save(); 
      
       return redirect()->action('HomeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
