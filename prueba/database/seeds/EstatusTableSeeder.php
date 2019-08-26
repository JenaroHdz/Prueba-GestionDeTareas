<?php

use App\Estatus;
use Illuminate\Database\Seeder;

class EstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatus = new Estatus();
        $estatus->desc_status = 'Por iniciar';
        $estatus->save();
        $estatus = new Estatus();
        $estatus->desc_status = 'Atrasado';
        $estatus->save();
        $estatus = new Estatus();
        $estatus->desc_status = 'En proceso';
        $estatus->save();
        $estatus = new Estatus();
        $estatus->desc_status = 'Finalizado';
        $estatus->save();
    }
}
