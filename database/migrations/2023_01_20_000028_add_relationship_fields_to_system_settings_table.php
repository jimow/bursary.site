<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSystemSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('system_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('financial_year_id')->nullable();
            $table->foreign('financial_year_id', 'financial_year_fk_7905174')->references('id')->on('financial_years');
        });
    }
}
