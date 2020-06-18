<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CeratePackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('spot_id')->increments();
            $table->string('spot_name',64)->unique();
            $table->text('desc');
            $table->string('extra_info',128)->nullable();
            $table->string('tooltip_text');
            $table->string('zone',64);
            $table->string('img_path')->nullable();
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
        Schema::dropIfExists('package_details');
    }
}
