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
        Schema::create('courrier_arrives', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('ref_envoi');
            $table->dateTime('date_envoie');
            $table->dateTime('date_arrivee');
            $table->text('objet');
            $table->unsignedBigInteger('type_exp_dest_id');
            $table->unsignedBigInteger('destination_arrive_id');
            $table->unsignedBigInteger('mode_courrier_id');
            $table->unsignedBigInteger('type_courrier_id');
            $table->unsignedBigInteger('nature_courrier_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('ministere_id');
            $table->unsignedBigInteger('etablissement_id');
            $table->unsignedBigInteger('pays_id');
            $table->string('etudiant');
            $table->integer('is_rep');
            $table->dateTime('date_rep');
            $table->unsignedBigInteger('etat_courrier_id');
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
        Schema::dropIfExists('courrier_arrives');
    }
};
