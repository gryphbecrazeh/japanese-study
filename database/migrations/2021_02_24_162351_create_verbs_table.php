<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('lastUpdated');
            $table->string('meaning');
            $table->string('politeForm');
            $table->string('verbType');
            $table->string('stem');
            $table->string('meanings'); // Serialized Array
            $table->string('kanji'); // Serialized Associative Array
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verbs');
    }
}
