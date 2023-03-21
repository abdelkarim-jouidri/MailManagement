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
            ['name' => 'DG'],
            ['name' => 'DAG'],
            ['name' => 'ق.ت.ا'],
            ['name' => 'DCTT'],
            ['name' => 'LA REGIE'],
        ]);

        DB::table('etat_courriers')->insert([
           [ 'name'=>'Urgent'],
           [ 'name'=>'Normal'],
           [ 'name'=>'Trés_urgent'],
       ]);

       DB::table('type_exp_dests')->insert([
        ['name'=>'السيد عميد كلية الاداب والعلوم الانسانية- المحمدية-'],
        ['name'=>'Personnel AMCI'],
        ['name'=>'AMBASSADE : AFGHANISTANE-Non résident'],
        ['name'=>'AMBASSADE : Albanie - Non résident'],
        ['name'=>'AMBASSADE : Algerie - Rabat-'],
        ['name'=>'AMBASSADE : Allemgne - Rabat -'],
        ['name'=>'AMBASSADE : Andorre - Non résident '],
        ['name'=>'AMBASSADE : Angola - Rabat-'],
        ['name'=>'AMBASSADE : Arabie Saoudite - Rabat-'],
        ]);

       DB::table('exp_dest_courriers')->insert([
       [ 'name'=>'Afghanistan (République d`Afghanistan)','type_exp_dest_id'=>1],
       [ 'name'=>'Angola','type_exp_dest_id'=>1],
       [ 'name'=>'Arabie Saoudite','type_exp_dest_id'=>1],
       [ 'name'=>'Belgique (Royaume de Belgique)','type_exp_dest_id'=>1],
       [ 'name'=>'Congo Démocratique','type_exp_dest_id'=>1],
       [ 'name'=>'E.A.U (Abu Dhabi)','type_exp_dest_id'=>1],
        ]);

        DB::table('menus')->insert([
            'tablename'=>'menu1',
            'title'=>'menu1',
            'Ordre'=>1,
            'afficher'=>1
            ]);

            DB::table('mode_courriers')->insert([
                ['name'=>'Courrier porté'],
                ['name'=>'Courrier posté'],
                ['name'=>'SMES'],
                ['name'=>'Fax'],
                ['name'=>'Autre'],
                ['name'=>'Personnel AMCI'],
                ['name'=>'VD'],
                ]);

                DB::table('nature_courriers')->insert([
                    ['name'=>'Note'],
                    ['name'=>'Lettre'],
                    ['name'=>'Bordereau d`envoi'],
                    ['name'=>'Decision'],
                    ['name'=>'رسالة'],
                    ['name'=>'Société divers '],
                    ['name'=>'Bulletin'],
                    ['name'=>'Confidentiel'],
                    ['name'=>'FACTURE'],
                    ['name'=>'مذكرة '],

                    ]);

                    DB::table('pays')->insert([
                        'name'=>'pay1'
                        ]);

                        DB::table('type_courriers')->insert([
                            ['name'=>'ترشيح'],
                            ['name'=>'Ordre de mission'],
                            ['name'=>'Bon de commande'],
                            ['name'=>'Absence'],
                            ['name'=>'Accorde de Coopération'],
                            ['name'=>'accueil'],
                            ['name'=>'Autre '],
                            ['name'=>'Attestation de don'],
                            ['name'=>'Certificat medical'],
                            ]);



                                DB::table('profils')->insert([
                                    ['name' => 'DG'],
                                    ['name' => 'DAG'],
                                    ['name' => 'DET'],
                                    ['name' => 'DFC'],
                                    ['name' => 'CUI'],
                                    ['name' => 'BO'],
                                ]);

                                        DB::table('fonctions')->insert([
                                            ['name' => 'Directeur Général'],
                                            ['name' => 'Chef de département'],
                                            ['name' => 'Chef de service'],
                                            ['name' => 'Administrateur du bureau d`ordre'],
                                        ]);
    }
}
