<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveQuestionFromLabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labels', function($table) {
            $table->dropForeign('labels_question_id_foreign');
            $table->dropColumn('question_id');

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
            $table->bigInteger('question_id')->unsigned()->nullable()->after('front_description');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }
}
