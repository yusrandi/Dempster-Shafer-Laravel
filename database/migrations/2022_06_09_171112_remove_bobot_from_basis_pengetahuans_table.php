<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBobotFromBasisPengetahuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basis_pengetahuans', function (Blueprint $table) {
            $table->dropColumn('bobot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basis_pengetahuans', function (Blueprint $table) {
            $table->double('bobot');
        });
    }
}
