<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsForCamerasToPatronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patrons', function (Blueprint $table) {
            $table->text('role');
            $table->dateTime('cameras_access_end_date')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patrons', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('cameras_access_end_date');
        });
    }
}
