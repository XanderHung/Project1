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
        $this->call(roleseeder::class);
        $this->call(userseeder::class);
        $this->call(categoryseeder::class);
    }
}
