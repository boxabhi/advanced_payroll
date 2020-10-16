<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsicReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esic_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->integer('number_of_working_hours');
            $table->string('working_day_salary');
            $table->string('amount_charge_esic_emp');
            $table->string('amount_charge_esic_government');
            $table->string('total');
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esic_reports');
    }
}
