<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patron_id')->unsigned();
            $table->integer('equipment_id')->unsigned();
            $table->dateTime('due_at');
            $table->dateTime('checked_out_at');
            $table->dateTime('checked_in_at')->nullable()->default(NULL);
            $table->integer('checked_out_by')->unsigned();
            $table->integer('checked_in_by')->unsigned()->nullable()->default(NULL);
            $table->text('checkout_note')->nullable()->default(NULL);
            $table->text('checkin_note')->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('patron_id')->references('id')->on('patrons');
            $table->foreign('equipment_id')->references('id')->on('equipment');
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
        Schema::dropIfExists('checkouts');
    }
}
