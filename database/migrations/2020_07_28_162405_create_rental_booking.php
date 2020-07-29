<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->foreign('vehicle_id')->references('vehicle_id')
                  ->on('rental_vehicles')->onDelete('cascade');
            $table->integer('no_of_days');
            $table->integer('total_amount');
            $table->string('pickup_date',128);
            $table->string('pickup_location');
            $table->string('pickup_time',128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rental_booking', function (Blueprint $table) {
            Schema::dropIfExists('rental_booking');
        });
    }
}
