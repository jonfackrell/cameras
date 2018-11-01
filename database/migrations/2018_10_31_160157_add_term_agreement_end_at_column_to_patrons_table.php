<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTermAgreementEndAtColumnToPatronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patrons', function (Blueprint $table) {
            $table->dateTime('term_agreement_end_at')->nullable()->default(NULL);
            $table->renameColumn('cameras_access_end_date', 'cameras_access_end_at');
            $table->unsignedSmallInteger('checkout_period')->default(1);
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
            $table->dropColumn('term_agreement_end_at');
            $table->renameColumn('cameras_access_end_at', 'cameras_access_end_date');
            $table->dropColumn('checkout_period');
        });
    }
}
