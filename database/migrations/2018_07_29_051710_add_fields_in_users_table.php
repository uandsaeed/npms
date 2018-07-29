<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {

            $table->timestamp('last_login')->nullable()->after('updated_at');
            $table->date('date_of_birth')->nullable()->before('role');
            $table->string('skin_tone', 50)->nullable()->before('email');
            $table->string('gender', 1)->nullable()->before('email')->default('f');
            $table->string('last_name', 100)->nullable()->before('email');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('last_login');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('skin_tone');
            $table->dropColumn('gender');
            $table->dropColumn('last_name');
        });
    }
}
