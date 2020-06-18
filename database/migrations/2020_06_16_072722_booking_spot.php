<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingSpot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_spot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned()->nullable();
            $table->foreign('booking_id')->references('booking_id')
                  ->on('booking_details')->onDelete('cascade');
            $table->integer('spot_id')->unsigned()->nullable();
            $table->foreign('spot_id')->references('id')
            ->on('package_details')->onDelete('cascade');
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
        //
    }
}
