<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicleAndHotelBookingWithPnr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rental_booking', function (Blueprint $table) {
            $table->string('booking_pnr');
        });
        Schema::table('hotel_details', function (Blueprint $table) {
            $table->string('booking_pnr');
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
        Schema::table('rental_booking', function (Blueprint $table) {
            $table->dropColumn('booking_pnr');
        });
        Schema::table('hotel_details', function (Blueprint $table) {
            $table->dropColumn('booking_pnr');
        });
    }
}
