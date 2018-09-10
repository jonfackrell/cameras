<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCameraCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camera_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patron_id')->unsigned();
            $table->dateTime('due_date');
            $table->dateTime('checked_in_date');
            $table->integer('checked_out_by')->unsigned();
            $table->integer('checked_in_by')->unsigned();
            $table->text('checkout_note')->nullable();
            $table->text('checkin_note')->nullable();
            $table->timestamps();

            $table->foreign('patron_id')->references('id')->on('patrons');
            $table->foreign('checked_out_by')->references('id')->on('users');
            $table->foreign('checked_in_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camera_checkouts');
    }
}
