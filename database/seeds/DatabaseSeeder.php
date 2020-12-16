<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categoryseeder::class);
        $this->call(roleseeder::class);
        $this->call(userseeder::class);
        $this->call(flowerSeeder::class);
    }
}
