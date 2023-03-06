<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_departs', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->dateTime('date_envoie');
            $table->text('objet');
            $table->integer('type_exp_dest_id');
            $table->integer('destination_arrive_id');
            $table->integer('mode_courrier_id');
            $table->integer('type_courrier_id');
            $table->integer('nature_courrier_id');
            $table->integer('utilisateur_id');
            $table->integer('mission_id');
            $table->integer('ministere_id');
            $table->integer('etablissement_id');
            $table->integer('pays_id');
            $table->string('etudiant');
            $table->integer('is_rep');
            $table->dateTime('date_rep');
            $table->integer('etat_courrier_id');
            $table->integer('is_lu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courrier_departs');
    }
};
