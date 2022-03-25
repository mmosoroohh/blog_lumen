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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('name');
            $table->string('isbn');
            $table->json('authors');
            $table->integer('numberOfPages');
            $table->string('publisher');
            $table->string('country');
            $table->string('mediaType');
            $table->dateTime('released');
            $table->json('characters');
            $table->json('povCharacters');
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
        Schema::dropIfExists('books');
    }
};
