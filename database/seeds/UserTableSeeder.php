<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
            'name'=> 'Marcos Navarro',
            'email' => 'marcos@navarro.com',
            'password' => bcrypt('123456')
        ]);
    }
}
