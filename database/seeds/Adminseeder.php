<?php

use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'email' => 'ahmedjakir257@gmail.com',
            'password' => bcrypt('Ad009256'),
        ]);
    }
}
