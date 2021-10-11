<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanjis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('meanings')->default('');
            $table->integer('timesRight')->default(0);
            $table->integer('timesWrong')->default(0);
            $table->boolean('shouldKnow')->default(false);
            $table->string('character')->default('');
            $table->string('proficiency')->default('');
            $table->string('onyomi')->default('');
            $table->string('kunyomi')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanjis');
    }
}
