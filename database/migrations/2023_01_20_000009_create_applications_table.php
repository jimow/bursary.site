<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->string('location')->nullable();
            $table->string('sub_location')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('village')->nullable();
            $table->string('institution');
            $table->string('admission_number')->unique();
            $table->string('form_year');
            $table->string('disability')->nullable();
            $table->longText('specify_disability');
            $table->string('received_bursary_before')->nullable();
            $table->string('both_parents_alive');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('fathers_tel_no')->nullable();
            $table->string('mothers_tel_no')->nullable();
            $table->decimal('total_fees_payable', 15, 2);
            $table->decimal('fee_balance', 15, 2);
            $table->string('student_grade');
            $table->string('recommended')->nullable();
            $table->string('on_scholarships')->nullable();
            $table->string('voter_card')->nullable();
            $table->decimal('cdf_amount_awarded', 15, 2)->nullable();
            $table->decimal('county_amount_awarded', 15, 2)->nullable();
            $table->string('recommended_for_county')->nullable();
            $table->string('gender')->nullable();
            $table->string('cdf_applied')->nullable();
            $table->string('county_applied')->nullable();
            $table->string('application_no')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
