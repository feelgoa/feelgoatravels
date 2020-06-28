<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTraveldate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_traveldate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned()->nullable();
            $table->foreign('booking_id')->references('booking_id')
                  ->on('booking_details')->onDelete('cascade');
            $table->string('travel_date',128);
            $table->string('day',64);
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
        Schema::table('booking_traveldate', function (Blueprint $table) {
            Schema::dropIfExists('booking_traveldate');
        });
    }
}
