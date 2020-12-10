<?php

use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['categoryname'=>'Hand Bounquet(gift)','categoryimage'=>'handbonquet.jpg'],
            ['categoryname'=>'Wedding Bonquet','categoryimage' => 'weddingbonquet.jpg'],
        ]);
    }
}
