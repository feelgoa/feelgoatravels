<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned()->nullable();
            $table->foreign('booking_id')->references('booking_id')
                  ->on('booking_details')->onDelete('cascade');
            $table->string('check_in_date',128);
            $table->string('check_out_date',128);
            $table->string('room_type',64);
            $table->integer('room_count');
            $table->string('extra_requirements');
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
        Schema::table('hotel_details', function (Blueprint $table) {
            Schema::dropIfExists('hotel_details');
        });
    }
}
