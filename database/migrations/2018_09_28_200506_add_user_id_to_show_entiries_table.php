<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToShowEntiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('show_entries', function($table) {
          $table->integer('user_id')->unsigned()->after('id');

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('show_entries', function($table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['user_id']);
            // 2. Drop the column
            $table->dropColumn('user_id');
        });
    }
}
