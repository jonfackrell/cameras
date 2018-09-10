<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('barcode');
            $table->string('item');
            $table->boolean('memory_card')->default(false);
            $table->unsignedTinyInteger('memory_card_size')->default(0);
            $table->boolean('battery')->default(false);
            $table->boolean('trp_head')->default(false);
            $table->boolean('trp_handle')->default(false);
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
        Schema::dropIfExists('equipment');
    }
}
