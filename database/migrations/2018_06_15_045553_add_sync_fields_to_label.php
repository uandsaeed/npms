<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSyncFieldsToLabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labels', function($table) {
            $table->boolean('require_sync')->before('updated_by')->default(true);
            $table->timestamp('last_sync')->before('updated_by')->nullable();
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
            $table->dropColumn('require_sync');
            $table->dropColumn('last_sync');
        });
    }
}
