<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin of All','email' => 'admin@admin.com', 'password' => '$2y$10$4Z42L.19MW6UKMgjtPl9iuOtMmHOo4PNgjpgLtIi0OH2sw.QQJj22'],
        ]);
    }
}
