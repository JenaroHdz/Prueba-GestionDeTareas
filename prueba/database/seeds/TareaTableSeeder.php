<?php

use App\Tarea;
use Illuminate\Database\Seeder;

class TareaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(Tarea::class, 5)->create();
    }
}
