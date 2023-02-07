<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_county_id')->nullable();
            $table->foreign('sub_county_id', 'sub_county_fk_7826530')->references('id')->on('sub_counties');
        });
    }
}
