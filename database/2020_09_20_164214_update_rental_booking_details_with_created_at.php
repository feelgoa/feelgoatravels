<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRentalBookingDetailsWithCreatedAt extends Migration
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
            $table->string('name',128)->default('arshad');
            $table->string('email',128)->default('arshad@gmail.com');
            $table->Biginteger('contact')->default(1234567890);
            $table->dateTime('created_at')->nullable()->after('pickup_time');
            $table->dateTime('updated_at')->nullable()->after('created_at');
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
