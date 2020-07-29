<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_vehicles', function (Blueprint $table) {
            $table->increments('vehicle_id');
            $table->string('vehicle_name',64);
            $table->string('vehicle_img',128);
            $table->string('capacity',128);
            $table->integer('rate');
            $table->string('desc');
            $table->string('type',64);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rental_vehicles', function (Blueprint $table) {
            Schema::dropIfExists('rental_cars');
        });
    }
}
