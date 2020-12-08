<?php

use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Hung',
            'email' => 'alexhung082008@gmail.com',
            'password' => Hash::make('Binusian22'),
            'address' => 'Jl.Lele No 5',
            'gender' => 'Male',
            'dob'=> '2000-10-23',
            'roleid'=> '2',
        ]);
    }
}
