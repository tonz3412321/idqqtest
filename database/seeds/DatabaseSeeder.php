<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SectionSeeder::class);
         $this->call(StatesSeeder::class);
         $this->call(LevelSeeder::class);
        $this->call(UserSeed::class);
    }
}
