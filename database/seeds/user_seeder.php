<?php

use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->truncate();

        DB::table('users')// 1
            ->insert([
                'rol' => 1,             // El super administrador
                'name'=>'Administrador',
                'email'=>'admin@gm.com',
                'password' => bcrypt('123')
            ]
        );
    }
}
