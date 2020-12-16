<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class flowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flower')->insert([
            ['categoryid'=>'1',
            'flowername'=>'Maroon Bouquet',
            'price'=>'450000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'1.jpg'],
            ['categoryid'=>'1',
            'flowername'=>'Red Bouquet',
            'price'=>'750000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'2.jpg'],
            ['categoryid'=>'1',
            'flowername'=>'Black red Bouquet',
            'price'=>'450000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'3.jpg'],
            ['categoryid'=>'2',
            'flowername'=>'Baby Blue',
            'price'=>'350000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'4.jpg'],
            ['categoryid'=>'2',
            'flowername'=>'Baby Yellow',
            'price'=>'360000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'5.jpeg'],
            ['categoryid'=>'3',
            'flowername'=>'Red Tulip',
            'price'=>'750000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'6.jpg'],
            ['categoryid'=>'3',
            'flowername'=>'Blue Tulip',
            'price'=>'550000',
            'description'=>'Cupcake cake topping cake candy canes toffee chocolate cake. Dragée icing chocolate tootsie roll marzipan brownie gummi bears jelly-o gingerbread.',
            'flowerimage'=>'7.jpg'],
        ]);
    }
}
