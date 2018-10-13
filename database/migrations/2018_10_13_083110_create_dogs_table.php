<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('breed_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->string('age')->nullable();
            $table->string('color')->nullable();
            $table->string('dog_name')->nullable();
            $table->string('pedigree_no')->nullable();
            $table->string('hair_type')->nullable();
            $table->string('microchip_no')->nullable();
            $table->string('tatto')->nullable();
            $table->string('sex')->nullable();
            $table->string('sir')->nullable();
            $table->string('dam')->nullable();
            $table->string('sir_pedigree_no')->nullable();
            $table->string('dam_pedigree_no')->nullable();
            $table->string('breeder')->nullable();
            $table->string('owner')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('dog_images')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('breed_id')->references('id')->on('breeds');
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
        Schema::dropIfExists('dogs');
    }
}
