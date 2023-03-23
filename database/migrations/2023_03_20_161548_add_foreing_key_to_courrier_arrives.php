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
        Schema::table('courrier_arrives', function (Blueprint $table) {
            $table->foreign('type_exp_dest_id') ->references('id')->on('type_exp_dests');
            $table->foreign('destination_arrive_id') ->references('id')->on('destination_arrives');
            $table->foreign('mode_courrier_id') ->references('id')->on('mode_courriers');
            $table->foreign('type_courrier_id') ->references('id')->on('type_courriers');
            $table->foreign('nature_courrier_id') ->references('id')->on('nature_courriers');
            $table->foreign('etat_courrier_id')->references('id')->on('etat_courriers');
            $table->foreign('utilisateur_id') ->references('id')->on('users');
            $table->foreign('pays_id') ->references('id')->on('pays');

            $table->binary('pdf_file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courrier_arrives', function (Blueprint $table) {
            //
        });
    }
};
