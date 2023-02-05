<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7813087')->references('id')->on('users');
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->foreign('ward_id', 'ward_fk_7813142')->references('id')->on('wards');
            $table->unsignedBigInteger('sub_county_id')->nullable();
            $table->foreign('sub_county_id', 'sub_county_fk_7827681')->references('id')->on('sub_counties');
            $table->unsignedBigInteger('financial_year_id')->nullable();
            $table->foreign('financial_year_id', 'financial_year_fk_7901024')->references('id')->on('financial_years');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_7881831')->references('id')->on('institutions');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_7905256')->references('id')->on('courses');
        });
    }
}
