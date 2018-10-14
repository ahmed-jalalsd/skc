<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassIdToShowEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('show_entries', function (Blueprint $table) {
            $table->integer('class_id')->unsigned()->after('dog_id');

            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('show_entries', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['class_id']);

           // 2. Drop the column
            $table->dropColumn('class_id');
        });
    }
}
