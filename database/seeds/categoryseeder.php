<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            ['categoryname'=>'Wedding Bouquet','categoryimage' => 'weddingbonquet.jpg'],
            ['categoryname'=>'Casual Bouquet','categoryimage' => 'Tulip.jpg'],
        ]);
    }
}
