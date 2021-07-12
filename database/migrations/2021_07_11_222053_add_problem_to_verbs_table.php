<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProblemToVerbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verbs', function (Blueprint $table) {
            if (!Schema::hasColumn('verbs', 'problem')) {
                //
                $table->boolean('problem')->default(false)->nullable(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verbs', function (Blueprint $table) {
            if (!Schema::hasColumn('verbs', 'problem')) {
                $table->dropColumn('problem');
            }
        });
    }
}
