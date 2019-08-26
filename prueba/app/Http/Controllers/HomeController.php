<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tarea;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      //  $request->user()->authorizeRoles(['admin']);
            
        $tareas = DB::table('tareas')
            ->join('prioridads', 'tareas.prioridad', '=', 'prioridads.id')
            ->join('users', 'tareas.id_user', '=', 'users.id')
            ->join('estatuses', 'tareas.status', '=', 'estatuses.id')
            ->select('tareas.*','prioridads.desc_prioridad', 'users.name','estatuses.desc_status')
            ->get();

        return view('home', compact('tareas'));
    }
}
