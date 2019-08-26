<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Jenaro';
        $user->email = 'nalo_hdz96@hotmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Hector';
        $user->email = 'hector_guzman@outlook.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Raul';
        $user->email = 'raul_mtz@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
