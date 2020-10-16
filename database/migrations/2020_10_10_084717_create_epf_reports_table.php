<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpfReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epf_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->integer('number_of_working_hours');
            $table->string('working_day_salary');
            $table->string('amount_charge_epf_emp');
            $table->string('amount_charge_epf_government');
            $table->string('total');
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }


    // report summary

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epf_reports');
    }
}
