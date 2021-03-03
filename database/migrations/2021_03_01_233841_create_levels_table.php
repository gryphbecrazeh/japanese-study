<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('dictionary')->default(serialize([]));
            $table->integer('score')->default(0);
            $table->integer('level')->default(0);
            $table->integer('highestStreak')->default(0);
            $table->integer('topScore')->default(0);
            $table->string('targetWord')->nullable()->default(null);
            $table->string('userTargetWord')->nullable()->default(null);
            $table->string('inputMode')->default('kana');
            $table->string('kana')->default('');
            $table->string('meanings')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
