<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAwardUploadsTable extends Migration
{
    public function up()
    {
        Schema::table('award_uploads', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_county_id')->nullable();
            $table->foreign('sub_county_id', 'sub_county_fk_7905180')->references('id')->on('sub_counties');
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->foreign('ward_id', 'ward_fk_7905181')->references('id')->on('wards');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7905182')->references('id')->on('users');
            $table->unsignedBigInteger('financial_year_id')->nullable();
            $table->foreign('financial_year_id', 'financial_year_fk_7905184')->references('id')->on('financial_years');
        });
    }
}
