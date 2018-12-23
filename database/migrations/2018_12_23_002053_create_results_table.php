<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('first_round'); // change the name to first_round and the type to number
            $table->boolean('status_first_round');
            $table->integer('second_round');
            $table->boolean('status_second_round');
            $table->integer('third_round');
            $table->boolean('status_third_round');
            $table->integer('final_round');
            $table->boolean('status_final_round');
            $table->string('classification'); // change to string
            $table->string('award')->nullable();

            $table->integer('show_entries_id')->unsigned();
            $table->foreign('show_entries_id')->references('id')->on('show_entries');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
