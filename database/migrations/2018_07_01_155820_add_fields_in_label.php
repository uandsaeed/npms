<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInLabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labels', function($table) {
            $table->tinyInteger('weight')->before('question_id')->default(LABEL_WEIGHT_VOID);
            $table->tinyInteger('match')->before('question_id')->default(LABEL_RELEVANCE_NEUTRAL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labels', function($table) {
            $table->dropColumn('weight');
            $table->dropColumn('match');
        });
    }
}
