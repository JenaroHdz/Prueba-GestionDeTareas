<?php

use App\Prioridad;
use Illuminate\Database\Seeder;

class PrioridadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prioridad = new Prioridad();
        $prioridad->desc_prioridad = 'Alta';
        $prioridad->save();
  
        $prioridad = new Prioridad();
        $prioridad->desc_prioridad = 'Media';
        $prioridad->save();

        $prioridad = new Prioridad();
        $prioridad->desc_prioridad = 'Baja';
        $prioridad->save();
    }
}
