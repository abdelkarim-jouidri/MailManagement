<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'admin',
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'is_admin'=>1,
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret'),

        ]);
        DB::table('profils')->insert([
            'name' => 'department'
          ]);

          DB::table('fonctions')->insert([
            'name' => fake()->jobTitle()
          ]);
    }
}
