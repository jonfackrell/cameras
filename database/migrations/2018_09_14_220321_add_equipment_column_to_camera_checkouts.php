<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEquipmentColumnToCameraCheckouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camera_checkouts', function (Blueprint $table) {
            $table->integer('equipment_id')->unsigned();
            $table->dateTime('checked_out_date');


            $table->foreign('equipment_id')->references('id')->on('camera_checkouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camera_checkouts', function (Blueprint $table) {
            $table->dropColumn('checked_out_date');
            $table->dropForeign(['equipment_id']);
        });
    }
}
