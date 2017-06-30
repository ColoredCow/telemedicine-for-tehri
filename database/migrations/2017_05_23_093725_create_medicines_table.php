<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('doctors', function (Blueprint $table) {
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
        });

        Schema::table('pharmacies', function (Blueprint $table) {
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
