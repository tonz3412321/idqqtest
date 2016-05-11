<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            ['name' => 'Saint Francis'],
            ['name' => 'Saint Paul'],
            ['name' => 'Saint Therese'],
            ['name' => 'Saint John'],
            ['name' => 'Saint Peter'],
            ['name' => 'Saint Luke'],
        ]);

    }
}
