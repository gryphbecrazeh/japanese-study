<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->date('lastUpdated')->default(Carbon::now());
            $table->string('meaning')->default('');
            $table->string('politeForm')->default('');
            $table->string('verbType')->default('');
            $table->integer('timesWrong')->default(0);
            $table->integer('timesRight')->default(0);
            $table->string('stem')->default('');
            $table->string('meanings')->serialize([]); // Serialized Array
            $table->string('kanji')->serialize([]); // Serialized Associative Array
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
