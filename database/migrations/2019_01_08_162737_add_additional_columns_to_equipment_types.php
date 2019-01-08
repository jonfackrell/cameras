<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalColumnsToEquipmentTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_types', function (Blueprint $table) {
            $table->longText('description')->nullable();
            $table->unsignedInteger('loan_period')->default(0);
            $table->unsignedInteger('fine_amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment_types', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('loan_period');
            $table->dropColumn('fine_amount');
        });
    }
}
