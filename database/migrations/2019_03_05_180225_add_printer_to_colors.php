<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrinterToColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colors', function (Blueprint $table) {
            $table->unsignedInteger('printer');
        });
        Schema::table('filaments_colors', function (Blueprint $table) {
            $table->unsignedInteger('printer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colors', function (Blueprint $table) {
            $table->dropColumn('printer');
        });
        Schema::table('filaments_colors', function (Blueprint $table) {
            $table->dropColumn('printer');
        });
    }
}
