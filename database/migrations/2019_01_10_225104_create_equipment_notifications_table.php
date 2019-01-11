<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patron_id')->unsigned();
            $table->integer('checkout_id')->nullable()->unsigned();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();

            $table->foreign('patron_id')->references('id')->on('patrons');
            $table->foreign('checkout_id')->references('id')->on('checkouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_notifications');
    }
}
