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
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret'),
            
        ]);
    }
}
