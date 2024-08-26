<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->string('time');
            $table->string('language');
            $table->date('release_date');
            $table->string('photo');
            $table->string('country');
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
