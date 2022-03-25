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
        Schema::create('characters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('name');
            $table->string('gender');
            $table->string('culture');
            $table->string('born');
            $table->string('died');
            $table->json('title');
            $table->json('aliases');
            $table->string('father');
            $table->string('mother');
            $table->string('spouse');
            $table->json('allegiances');
            $table->json('books');
            $table->json('povBooks');
            $table->json('tvSeries');
            $table->json('playedBy');
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
        Schema::dropIfExists('characters');
    }
};
