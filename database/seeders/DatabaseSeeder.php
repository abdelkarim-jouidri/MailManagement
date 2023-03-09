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

        DB::table('destination_arrives')->insert([
             'name'=>'destination1'
        ]);

        DB::table('etat_courriers')->insert([
            'name'=>'etat1'
       ]);

       DB::table('exp_dest_courriers')->insert([
        'name'=>'ExpDestCourr1',
        'type_exp_dest_id'=>1
        ]);

        DB::table('menus')->insert([
            'tablename'=>'menu1',
            'title'=>'menu1',
            'Ordre'=>1,
            'afficher'=>1
            ]);

            DB::table('mode_courriers')->insert([
                'name'=>'mode1'
                ]);
                DB::table('nature_courriers')->insert([
                    'name'=>'NatureCourrier1'
                    ]);

                    DB::table('pays')->insert([
                        'name'=>'pay1'
                        ]);

                        DB::table('type_courriers')->insert([
                            'name'=>'TypeCour1'
                            ]);

                            DB::table('type_exp_dests')->insert([
                                'name'=>'TypeExp1'
                                ]);

                                DB::table('profils')->insert([
                                    'name' => 'department'
                                ]);

                                        DB::table('fonctions')->insert([
                                            'name' => fake()->jobTitle()
                                        ]);
    }
}
