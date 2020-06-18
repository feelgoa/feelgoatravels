<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_name')->unique();
            $table->string('img_path')->unique();
            $table->string('button_name');
            $table->string('link');
            $table->boolean('visibility')->default(true);
            $table->boolean('duration')->default(true);
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->integer('ordering');
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
        Schema::dropIfExists('sliders');
    }
}
