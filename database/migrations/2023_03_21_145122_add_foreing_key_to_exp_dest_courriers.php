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
        Schema::table('exp_dest_courriers', function (Blueprint $table) {
            $table->foreign('type_exp_dest_id') ->references('id')->on('type_exp_dests');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exp_dest_courriers', function (Blueprint $table) {
            //
        });
    }
};
