<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountiesTable extends Migration
{
    public function up()
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('county');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
