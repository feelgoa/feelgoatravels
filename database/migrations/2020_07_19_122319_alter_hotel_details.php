<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHotelDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_details', function (Blueprint $table) {
            $table->Integer('member_count')->nullable()->after('room_count');
            $table->text('extra_requirements')->nullable()->change();
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
            $table->text('extra_requirements')->change();
            $table->dropColumn('member_count');
        });
    }
}
